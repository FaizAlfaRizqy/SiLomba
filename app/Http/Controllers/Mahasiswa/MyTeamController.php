<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTim;
use App\Models\Lamaran;
use App\Models\Notification;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyTeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        if (! $mahasiswa) {
            return redirect()->route('mahasiswa.profile.edit')->with('error', 'Silakan lengkapi profil mahasiswa Anda terlebih dahulu.');
        }

        // DATA 1 — Sebagai PELAMAR (mahasiswa biasa):
        $lamaranSaya = Lamaran::with([
            'slot.tim.lomba',
            'slot.tim.ketua',
        ])
            ->where('id_pelamar', $user->id)
            ->latest()
            ->get()
            ->groupBy('status');

        $lamaranPending = $lamaranSaya->get('pending', collect());
        $lamaranDiterima = $lamaranSaya->get('diterima', collect());
        $lamaranDitolak = $lamaranSaya->get('ditolak', collect());

        // DATA 2 — Sebagai KETUA TIM:
        $timSayaKetuai = Tim::with([
            'lomba',
            'anggota.user',
            'anggota.mahasiswa',
            'slots.lamarans.pelamar.mahasiswa',
        ])
            ->where('id_ketua', $user->id)
            ->latest()
            ->get();

        $lamaranMasuk = Lamaran::with([
            'slot.tim.lomba',
            'pelamar.mahasiswa',
        ])
            ->whereHas('slot.tim', function ($q) use ($user) {
                $q->where('id_ketua', $user->id);
            })
            ->where('status', 'pending')
            ->latest()
            ->get();

        $totalLamaranMasuk = $lamaranMasuk->count();

        // DATA 3 — Tim yang diikuti sebagai anggota (bukan ketua):
        $timSebagaiAnggota = AnggotaTim::with([
            'tim.lomba',
            'tim.ketua.mahasiswa',
            'tim.anggota.user',
            'tim.anggota.mahasiswa',
        ])
            ->where('id_mahasiswa', $user->id)
            ->whereHas('tim', function ($q) use ($user) {
                $q->where('id_ketua', '!=', $user->id);
            })
            ->latest()
            ->get();

        return view('mahasiswa.my-teams.index', compact(
            'mahasiswa',
            'lamaranPending',
            'lamaranDiterima',
            'lamaranDitolak',
            'timSayaKetuai',
            'timSebagaiAnggota',
            'lamaranMasuk',
            'totalLamaranMasuk'
        ));
    }

    public function show($id)
    {
        $user = Auth::user();
        $tim = Tim::with([
            'lomba',
            'ketua.mahasiswa',
            'anggota.user',
            'anggota.mahasiswa',
            'slots.lamarans',
        ])->findOrFail($id);

        // Check if user is member of this team
        $isMember = $tim->anggota->contains('id_mahasiswa', $user->id) || $tim->id_ketua == $user->id;

        if (! $isMember) {
            return redirect()->route('mahasiswa.my-teams.index')->with('error', 'Anda bukan anggota tim ini.');
        }

        return view('mahasiswa.my-teams.show', compact('tim'));
    }

    public function terimaLamaran(Request $request, Lamaran $lamaran)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        // 1. Load data
        $lamaran->load(['slot.tim.lomba', 'pelamar.mahasiswa', 'slot.tim.anggota']);

        // 2. VALIDASI AKSES
        if ($lamaran->slot->tim->id_ketua !== $user->id) {
            abort(403, 'Bukan ketua tim ini');
        }

        // 3. VALIDASI STATUS
        if ($lamaran->status !== 'pending') {
            return back()->with('error', 'Lamaran ini sudah diproses sebelumnya');
        }

        // 4. VALIDASI SLOT TERSISA
        $anggotaDiterima = Lamaran::where('id_slot', $lamaran->id_slot)
            ->where('status', 'diterima')
            ->count();
        if ($anggotaDiterima >= $lamaran->slot->jumlah_slot) {
            return back()->with('error', 'Slot sudah penuh');
        }

        // 5. VALIDASI TIDAK DI TIM LAIN untuk lomba yang sama
        $sudahDiTim = AnggotaTim::whereHas('tim', function ($q) use ($lamaran) {
            $q->where('id_lomba', $lamaran->slot->tim->id_lomba);
        })->where('id_mahasiswa', $lamaran->id_pelamar)->exists();

        if ($sudahDiTim) {
            return back()->with('error', 'Pelamar sudah bergabung di tim lain untuk lomba yang sama');
        }

        DB::beginTransaction();
        try {
            // 6. UPDATE STATUS LAMARAN
            $lamaran->update([
                'status' => 'diterima',
                'processed_at' => now(),
            ]);

            // 7. TAMBAH KE ANGGOTA TIM
            AnggotaTim::create([
                'id_tim' => $lamaran->slot->tim->id,
                'id_mahasiswa' => $lamaran->id_pelamar,
                'peran' => 'anggota',
                'joined_at' => now(),
            ]);

            // 8. TOLAK OTOMATIS lamaran pending lain dari orang yang sama di lomba yang sama
            Lamaran::where('id_pelamar', $lamaran->id_pelamar)
                ->where('id', '!=', $lamaran->id)
                ->where('status', 'pending')
                ->whereHas('slot.tim', function ($q) use ($lamaran) {
                    $q->where('id_lomba', $lamaran->slot->tim->id_lomba);
                })
                ->update([
                    'status' => 'ditolak',
                    'processed_at' => now(),
                    'alasan_penolakan' => 'Otomatis ditolak karena sudah diterima di tim lain pada lomba yang sama',
                ]);

            // 9. KIRIM NOTIFIKASI ke pelamar
            Notification::create([
                'id_penerima' => $lamaran->id_pelamar,
                'judul' => '🎉 Lamaran Diterima!',
                'isi' => 'Selamat! Lamaranmu untuk posisi '.$lamaran->slot->posisi.' di tim '.$lamaran->slot->tim->nama_tim.' telah DITERIMA oleh ketua tim.',
                'tipe' => 'lamaran_diterima',
                'is_read' => false,
                'link' => route('mahasiswa.my-teams.index'),
                'created_at' => now(),
            ]);

            // 10. KIRIM NOTIFIKASI ke semua anggota tim yang sudah ada (selain ketua)
            $anggotaLama = $lamaran->slot->tim->anggota;
            foreach ($anggotaLama as $anggota) {
                if ($anggota->id_mahasiswa != $user->id && $anggota->id_mahasiswa != $lamaran->id_pelamar) {
                    Notification::create([
                        'id_penerima' => $anggota->id_mahasiswa,
                        'judul' => '👋 Anggota Baru Bergabung!',
                        'isi' => $lamaran->pelamar->name.' baru saja bergabung di tim '.$lamaran->slot->tim->nama_tim.' sebagai '.$lamaran->slot->posisi,
                        'tipe' => 'anggota_baru',
                        'is_read' => false,
                        'link' => route('mahasiswa.my-teams.show', $lamaran->slot->tim->id),
                        'created_at' => now(),
                    ]);
                }
            }

            // 11. CEK SLOT PENUH setelah diterima
            if ($anggotaDiterima + 1 >= $lamaran->slot->jumlah_slot) {
                $lamaran->slot->update(['status' => 'tutup']);
            }

            DB::commit();

            return redirect()->route('mahasiswa.my-teams.index')
                ->with('success', 'Lamaran dari '.$lamaran->pelamar->name.' berhasil diterima!');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }

    public function tolakLamaran(Request $request, Lamaran $lamaran)
    {
        $user = Auth::user();

        // 1. Validasi request
        $request->validate([
            'alasan' => 'nullable|max:500',
        ]);

        // 2. Ambil lamaran + relasi
        $lamaran->load(['slot.tim', 'pelamar']);

        // 3. VALIDASI AKSES
        if ($lamaran->slot->tim->id_ketua !== $user->id) {
            abort(403);
        }

        // 4. VALIDASI STATUS
        if ($lamaran->status !== 'pending') {
            return back()->with('error', 'Lamaran sudah diproses');
        }

        // 5. UPDATE STATUS
        $lamaran->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan,
            'processed_at' => now(),
        ]);

        // 6. KIRIM NOTIFIKASI ke pelamar
        Notification::create([
            'id_penerima' => $lamaran->id_pelamar,
            'judul' => 'Lamaran Tidak Diterima',
            'isi' => 'Maaf, lamaranmu untuk posisi '.$lamaran->slot->posisi.' di tim '.$lamaran->slot->tim->nama_tim.' tidak diterima.'.($request->alasan ? ' Alasan: '.$request->alasan : ''),
            'tipe' => 'lamaran_ditolak',
            'is_read' => false,
            'link' => route('mahasiswa.tim-finder.index'),
            'created_at' => now(),
        ]);

        return redirect()->route('mahasiswa.my-teams.index')
            ->with('success', 'Lamaran dari '.$lamaran->pelamar->name.' telah ditolak.');
    }

    public function cancelLamaran($id)
    {
        $user = Auth::user();
        $lamaran = Lamaran::where('id', $id)
            ->where('id_pelamar', $user->id)
            ->firstOrFail();

        if ($lamaran->status !== 'pending') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan karena statusnya sudah '.$lamaran->status);
        }

        $lamaran->delete();

        return redirect()->route('mahasiswa.my-teams.index')
            ->with('success', 'Lamaran berhasil dibatalkan');
    }
}

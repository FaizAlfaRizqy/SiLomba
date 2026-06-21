<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTim;
use App\Models\Lamaran;
use App\Models\Notification;
use App\Models\SlotTim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimFinderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $query = SlotTim::with(['tim.lomba', 'tim.ketua'])
            ->where('status', 'buka')
            ->where('batas_waktu', '>=', now()->startOfDay());

        // Filters
        if ($request->filled('lomba_id')) {
            $query->whereHas('tim', function ($q) use ($request) {
                $q->where('id_lomba', $request->lomba_id);
            });
        }

        if ($request->filled('kategori')) {
            $query->whereHas('tim.lomba', function ($q) use ($request) {
                $q->where('kategori', $request->kategori);
            });
        }

        $slots = $query->latest()->paginate(10);

        // Recommendation Logic
        $recommendations = collect();
        if ($mahasiswa && ! empty($mahasiswa->keahlian)) {
            $userSkills = collect($mahasiswa->keahlian);

            $allOpenSlots = SlotTim::with(['tim.lomba', 'tim.ketua'])
                ->where('status', 'buka')
                ->where('batas_waktu', '>=', now()->startOfDay())
                ->get();

            foreach ($allOpenSlots as $slot) {
                $requiredSkills = collect($slot->keahlian_dibutuhkan);
                if ($requiredSkills->isEmpty()) {
                    continue;
                }

                $matched = $userSkills->intersect($requiredSkills)->count();
                $score = ($matched / $requiredSkills->count()) * 100;

                if ($score > 0) {
                    $slot->matching_score = $score;
                    $recommendations->push($slot);
                }
            }

            $recommendations = $recommendations->sortByDesc('matching_score')->take(5);
        }

        return view('mahasiswa.tim_finder.index', compact('slots', 'recommendations', 'mahasiswa'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $slot = SlotTim::with([
            'tim.lomba',
            'tim.ketua.mahasiswa',
            'tim.anggota' => function ($query) {
                $query->with(['mahasiswa', 'user'])
                    ->orderBy('peran', 'asc');
            },
            'lamarans' => function ($query) {
                $query->where('status', 'diterima');
            },
        ])->findOrFail($id);

        $anggotaTim = $slot->tim->anggota ?? collect();
        $totalAnggota = $anggotaTim->count();
        $maksAnggota = $slot->tim->maks_anggota;
        $timPenuh = $totalAnggota >= $maksAnggota;

        // Check conditions for application
        $sudahMelamar = Lamaran::where('id_slot', $slot->id)
            ->where('id_pelamar', $user->id)
            ->first();

        $sudahDiTim = AnggotaTim::where('id_mahasiswa', $user->id)
            ->whereHas('tim', function ($q) use ($slot) {
                $q->where('id_lomba', $slot->tim->id_lomba);
            })->exists();

        $slotTersisa = $slot->jumlah_slot - $slot->lamarans->count();

        $lamaranHariIni = Lamaran::where('id_pelamar', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Stats for sidebar
        $totalPelamar = Lamaran::where('id_slot', $slot->id)->count();
        $diterimaCount = $slot->lamarans->count();
        $menungguCount = Lamaran::where('id_slot', $slot->id)->where('status', 'pending')->count();

        return view('mahasiswa.tim_finder.show', compact(
            'slot',
            'mahasiswa',
            'sudahMelamar',
            'sudahDiTim',
            'slotTersisa',
            'anggotaTim',
            'totalAnggota',
            'maksAnggota',
            'timPenuh',
            'lamaranHariIni',
            'totalPelamar',
            'diterimaCount',
            'menungguCount'
        ));
    }

    public function apply(Request $request, $id)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $slot = SlotTim::findOrFail($id);

        // 1. Cek profil lengkap
        if (! $mahasiswa || empty($mahasiswa->keahlian)) {
            return back()->with('error', 'Lengkapi profil keahlianmu terlebih dahulu');
        }

        // 2. Cek status buka
        if ($slot->status !== 'buka') {
            return back()->with('error', 'Slot ini sudah ditutup');
        }

        // 3. Cek batas waktu
        if ($slot->batas_waktu < now()->startOfDay()) {
            return back()->with('error', 'Batas waktu pendaftaran sudah berakhir');
        }

        // 4. Cek slot tersisa
        $diterimaCount = Lamaran::where('id_slot', $slot->id)->where('status', 'diterima')->count();
        if ($diterimaCount >= $slot->jumlah_slot) {
            return back()->with('error', 'Maaf, slot ini sudah penuh');
        }

        // 5. Cek belum pernah melamar
        $existing = Lamaran::where('id_slot', $slot->id)->where('id_pelamar', $user->id)->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah pernah melamar slot ini');
        }

        // 6. Cek belum di tim lain di lomba yang sama
        $inOtherTeam = AnggotaTim::where('id_mahasiswa', $user->id)
            ->whereHas('tim', function ($q) use ($slot) {
                $q->where('id_lomba', $slot->tim->id_lomba);
            })->exists();
        if ($inOtherTeam) {
            return back()->with('error', 'Kamu sudah tergabung di tim lain untuk lomba ini');
        }

        // 7. Rate limit 20 lamaran per hari
        $dailyCount = Lamaran::where('id_pelamar', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->count();
        if ($dailyCount >= 20) {
            return back()->with('error', 'Batas 20 lamaran hari ini sudah tercapai. Coba lagi besok.');
        }

        // 8. Validasi form
        $request->validate([
            'pesan_motivasi' => 'required|string|min:50|max:1000',
        ]);

        // Save
        $lamaran = new Lamaran;
        $lamaran->id_slot = $slot->id;
        $lamaran->id_pelamar = $user->id;
        $lamaran->pesan_motivasi = $request->pesan_motivasi;
        $lamaran->status = 'pending';
        $lamaran->save();

        // Notification to team leader
        Notification::create([
            'id_penerima' => $slot->tim->id_ketua,
            'judul' => 'Lamaran Baru Masuk!',
            'isi' => $user->name.' melamar posisi '.$slot->posisi.' di tim '.$slot->tim->nama_tim,
            'tipe' => 'lamaran_masuk',
            'link' => route('mahasiswa.team.manage', $slot->id_tim),
        ]);

        return redirect()->route('mahasiswa.tim-finder.show', $slot->id)
            ->with('success', 'Lamaran berhasil dikirim! Ketua tim akan segera memproses lamaranmu.');
    }
}

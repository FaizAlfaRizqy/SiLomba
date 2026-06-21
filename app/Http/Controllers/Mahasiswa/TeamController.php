<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTim;
use App\Models\Lamaran;
use App\Models\Lomba;
use App\Models\Notification;
use App\Models\SlotTim;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function create(Request $request)
    {
        $selectedLombaId = $request->query('lomba_id');
        $lombas = Lomba::where('status', 'buka')
            ->where('deadline', '>=', now()->startOfDay())
            ->orderBy('deadline', 'asc')
            ->get();
        return view('mahasiswa.teams.create', compact('lombas', 'selectedLombaId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lomba' => 'required|exists:lomba,id',
            'nama_tim' => 'required|string|max:255',
            'maks_anggota' => 'required|integer|min:2',
            'posisi' => 'required|string|max:255',
            'jumlah_slot' => 'required|integer|min:1',
            'keahlian_dibutuhkan' => 'required|array',
            'deskripsi_slot' => 'required|string',
            'batas_waktu' => 'required|date|after_or_equal:today|before_or_equal:'.Lomba::find($request->id_lomba)->deadline->toDateString(),
            'status_publikasi' => 'required|in:draft,publikasi',
        ]);

        $user = Auth::user();

        $tim = Tim::create([
            'nama_tim' => $request->nama_tim,
            'id_lomba' => $request->id_lomba,
            'id_ketua' => $user->id,
            'maks_anggota' => $request->maks_anggota,
        ]);

        AnggotaTim::create([
            'id_tim' => $tim->id,
            'id_mahasiswa' => $user->id,
            'peran' => 'ketua',
            'joined_at' => now(),
        ]);

        SlotTim::create([
            'id_tim' => $tim->id,
            'posisi' => $request->posisi,
            'keahlian_dibutuhkan' => $request->keahlian_dibutuhkan,
            'jumlah_slot' => $request->jumlah_slot,
            'deskripsi' => $request->deskripsi_slot,
            'batas_waktu' => $request->batas_waktu,
            'status' => $request->status_publikasi === 'draft' ? 'draft' : 'buka',
        ]);

        if (! $user->hasRole('ketua_tim')) {
            $user->assignRole('ketua_tim');
        }

        return redirect()->route('mahasiswa.my-teams.index')->with('success', 'Tim berhasil dibuat!');
    }

    public function myTeams()
    {
        $user = Auth::user();
        $ledTeams = Tim::where('id_ketua', $user->id)->with('lomba')->get();
        $joinedTeams = Tim::whereHas('anggota', function ($q) use ($user) {
            $q->where('id_mahasiswa', $user->id)->where('peran', '!=', 'ketua');
        })->with('lomba')->get();

        return view('mahasiswa.teams.index', compact('ledTeams', 'joinedTeams'));
    }

    public function manage($id)
    {
        $tim = Tim::with(['lomba', 'anggota.user.mahasiswa', 'slots.lamarans.pelamar.mahasiswa'])->findOrFail($id);

        if ($tim->id_ketua !== Auth::id()) {
            abort(403);
        }

        return view('mahasiswa.teams.manage', compact('tim'));
    }

    public function apply(Request $request, $slotId)
    {
        $slot = SlotTim::with('tim.lomba')->findOrFail($slotId);
        $user = Auth::user();

        $alreadyInTeam = AnggotaTim::where('id_mahasiswa', $user->id)
            ->whereHas('tim', function ($q) use ($slot) {
                $q->where('id_lomba', $slot->tim->id_lomba);
            })->exists();

        if ($alreadyInTeam) {
            return back()->with('error', 'Anda sudah bergabung dalam tim lain untuk lomba ini.');
        }

        if ($slot->status === 'tutup' || $slot->lamarans()->where('status', 'diterima')->count() >= $slot->jumlah_slot) {
            return back()->with('error', 'Slot sudah penuh atau sudah ditutup.');
        }

        $request->validate([
            'pesan_motivasi' => ['required', 'string', 'min:20'],
        ]);

        Lamaran::create([
            'id_slot' => $slot->id,
            'id_pelamar' => $user->id,
            'pesan_motivasi' => $request->pesan_motivasi,
            'status' => 'pending',
        ]);

        Notification::create([
            'id_penerima' => $slot->tim->id_ketua,
            'judul' => 'Lamaran Baru!',
            'isi' => $user->name.' melamar untuk posisi '.$slot->posisi.' di tim '.$slot->tim->nama_tim,
            'tipe' => 'application',
        ]);

        return redirect()->route('mahasiswa.tim-finder.index')->with('success', 'Lamaran berhasil dikirim.');
    }

    public function acceptApplication($id)
    {
        $lamaran = Lamaran::with('slot.tim')->findOrFail($id);

        if ($lamaran->slot->tim->id_ketua !== Auth::id()) {
            abort(403);
        }

        $lamaran->update(['status' => 'diterima', 'processed_at' => now()]);

        AnggotaTim::create([
            'id_tim' => $lamaran->slot->id_tim,
            'id_mahasiswa' => $lamaran->id_pelamar,
            'peran' => 'anggota',
            'joined_at' => now(),
        ]);

        Notification::create([
            'id_penerima' => $lamaran->id_pelamar,
            'judul' => 'Lamaran Diterima!',
            'isi' => 'Selamat! Lamaran Anda diterima di tim '.$lamaran->slot->tim->nama_tim,
            'tipe' => 'application',
        ]);

        return back()->with('success', 'Pelamar berhasil diterima.');
    }

    public function rejectApplication(Request $request, $id)
    {
        $lamaran = Lamaran::with('slot.tim')->findOrFail($id);

        if ($lamaran->slot->tim->id_ketua !== Auth::id()) {
            abort(403);
        }

        $lamaran->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan,
            'processed_at' => now(),
        ]);

        Notification::create([
            'id_penerima' => $lamaran->id_pelamar,
            'judul' => 'Lamaran Ditolak',
            'isi' => 'Maaf, lamaran Anda untuk tim '.$lamaran->slot->tim->nama_tim.' ditolak. Alasan: '.($request->alasan ?: '-'),
            'tipe' => 'application',
        ]);

        return back()->with('success', 'Pelamar berhasil ditolak.');
    }
}

<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\AnggotaTim;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.profile.edit')->with('error', 'Silakan lengkapi profil mahasiswa Anda terlebih dahulu.');
        }

        $lamaranPending = Lamaran::with([
            'slot.tim.lomba',
            'slot.tim.ketua'
        ])
        ->where('id_pelamar', $user->id)
        ->where('status', 'pending')
        ->latest()
        ->get();

        $lamaranDiterima = Lamaran::with([
            'slot.tim.lomba',
            'slot.tim.ketua',
            'slot.tim.anggota.user',
            'slot.tim.anggota.mahasiswa'
        ])
        ->where('id_pelamar', $user->id)
        ->where('status', 'diterima')
        ->latest()
        ->get();

        $lamaranDitolak = Lamaran::with([
            'slot.tim.lomba'
        ])
        ->where('id_pelamar', $user->id)
        ->where('status', 'ditolak')
        ->latest()
        ->get();

        $timAktif = AnggotaTim::with([
            'tim.lomba',
            'tim.ketua.mahasiswa',
            'tim.anggota.user',
            'tim.anggota.mahasiswa'
        ])
        ->where('id_mahasiswa', $user->id)
        ->latest()
        ->get();

        return view('mahasiswa.my-teams.index', compact(
            'lamaranPending',
            'lamaranDiterima', 
            'lamaranDitolak',
            'timAktif',
            'mahasiswa'
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
            'slots.lamarans'
        ])->findOrFail($id);

        // Check if user is member of this team
        $isMember = $tim->anggota->contains('id_mahasiswa', $user->id) || $tim->id_ketua == $user->id;
        
        if (!$isMember) {
            return redirect()->route('mahasiswa.my-teams.index')->with('error', 'Anda bukan anggota tim ini.');
        }

        return view('mahasiswa.my-teams.show', compact('tim'));
    }

    public function cancelLamaran($id)
    {
        $user = Auth::user();
        $lamaran = Lamaran::where('id', $id)
            ->where('id_pelamar', $user->id)
            ->firstOrFail();

        if ($lamaran->status !== 'pending') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan karena statusnya sudah ' . $lamaran->status);
        }

        $lamaran->delete();

        return redirect()->route('mahasiswa.my-teams.index')
            ->with('success', 'Lamaran berhasil dibatalkan');
    }
}

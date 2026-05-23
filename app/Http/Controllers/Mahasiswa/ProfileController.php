<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        return view('mahasiswa.profile.edit', compact('user', 'mahasiswa'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $request->validate([
            'foto_profil' => ['nullable', 'image', 'max:2048'],
            'keahlian' => ['required', 'array', 'min:1'],
            'minat_lomba' => ['required', 'array', 'min:1'],
            'link_portofolio' => ['nullable', 'url'],
            'ketersediaan_waktu' => ['required', 'in:Full-time,Part-time,Weekends only'],
            'level_privasi' => ['required', 'in:publik,privat,tim saja'],
            'program_studi' => ['required', 'string', 'max:255'],
            'domisili' => ['required', 'string', 'max:255'],
        ]);

        // Handle Image Upload
        if ($request->hasFile('foto_profil')) {
            // Delete old photo
            if ($mahasiswa->foto_profil) {
                Storage::disk('public')->delete($mahasiswa->foto_profil);
            }

            $image = $request->file('foto_profil');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = 'profiles/'.$filename;

            // Resize image using Intervention Image
            $img = Image::decode($image);
            $img->cover(300, 300); // Resize and crop

            Storage::disk('public')->put($path, (string) $img->encodeUsingFileExtension($image->getClientOriginalExtension()));

            $mahasiswa->foto_profil = $path;
        }

        $mahasiswa->update([
            'keahlian' => $request->keahlian,
            'minat_lomba' => $request->minat_lomba,
            'link_portofolio' => $request->link_portofolio,
            'ketersediaan_waktu' => $request->ketersediaan_waktu,
            'level_privasi' => $request->level_privasi,
            'program_studi' => $request->program_studi,
            'domisili' => $request->domisili,
        ]);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Profil berhasil diperbarui!');
    }

    public function portfolio($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->where('level_privasi', 'publik')->firstOrFail();

        return view('mahasiswa.profile.portfolio', compact('mahasiswa'));
    }

    public function notifications()
    {
        $notifications = Notification::where('id_penerima', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Mark all as read
        Notification::where('id_penerima', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('mahasiswa.notifikasi', compact('notifications'));
    }
}

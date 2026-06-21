<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::latest()->paginate(10);

        return view('admin.lomba.index', compact('lombas'));
    }

    public function create()
    {
        return view('admin.lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kategori_kustom' => 'nullable|string|required_if:kategori,Lainnya',
            'tingkat' => 'required|in:nasional,internasional,regional',
            'tanggal_buka' => 'required|date',
            'deadline' => 'required|date|after_or_equal:tanggal_buka',
            'hadiah' => 'nullable|string',
            'syarat_peserta' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'link_resmi' => 'required|url',
            'poster' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($data['kategori'] === 'Lainnya' && !empty($data['kategori_kustom'])) {
            $data['kategori'] = $data['kategori_kustom'];
        }
        $data['id_admin'] = auth()->id();
        $data['status'] = 'buka'; // Default status saat pertama kali dibuat

        if ($request->hasFile('poster')) {
            $image = $request->file('poster');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = 'posters/'.$filename;

            $img = Image::decode($image);
            $img->scale(width: 800); // Scale to 800px width

            Storage::disk('public')->put($path, (string) $img->encodeUsingFileExtension($image->getClientOriginalExtension()));
            $data['poster'] = $path;
        }

        Lomba::create($data);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil ditambahkan!');
    }

    public function show(Lomba $lomba)
    {
        return redirect()->route('admin.lomba.edit', $lomba);
    }

    public function edit(Lomba $lomba)
    {
        return view('admin.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, Lomba $lomba)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'kategori' => 'required|string',
            'kategori_kustom' => 'nullable|string|required_if:kategori,Lainnya',
            'tingkat' => 'required|in:nasional,internasional,regional',
            'tanggal_buka' => 'required|date',
            'deadline' => 'required|date|after_or_equal:tanggal_buka',
            'hadiah' => 'nullable|string',
            'syarat_peserta' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'link_resmi' => 'required|url',
            'poster' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($data['kategori'] === 'Lainnya' && !empty($data['kategori_kustom'])) {
            $data['kategori'] = $data['kategori_kustom'];
        }

        if ($request->hasFile('poster')) {
            if ($lomba->poster) {
                Storage::disk('public')->delete($lomba->poster);
            }

            $image = $request->file('poster');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $path = 'posters/'.$filename;

            $img = Image::decode($image);
            $img->scale(width: 800);

            Storage::disk('public')->put($path, (string) $img->encodeUsingFileExtension($image->getClientOriginalExtension()));
            $data['poster'] = $path;
        }

        $lomba->update($data);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil diperbarui!');
    }

    public function destroy(Lomba $lomba)
    {
        $lomba->delete();

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil dihapus (soft delete).');
    }

    public function toggleStatus(Lomba $lomba)
    {
        $lomba->update([
            'status' => $lomba->status === 'buka' ? 'tutup' : 'buka',
        ]);

        return back()->with('success', 'Status lomba "'.$lomba->nama.'" berhasil diubah ke '.($lomba->status === 'buka' ? 'Buka' : 'Tutup').'.');
    }
}

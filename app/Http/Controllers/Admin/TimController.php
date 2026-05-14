<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Tim;
use Illuminate\Http\Request;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tims = Tim::with(['lomba', 'ketua'])->latest()->paginate(10);
        return view('admin.tim.index', compact('tims'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tim $tim)
    {
        $tim->load(['lomba', 'ketua', 'anggota.user', 'slots']);
        return view('admin.tim.show', compact('tim'));
    }

    /**
     * Remove the specified resource from the storage.
     */
    public function destroy(Tim $tim)
    {
        $tim->delete();
        return redirect()->route('admin.tim.index')->with('success', 'Tim berhasil dihapus.');
    }
}

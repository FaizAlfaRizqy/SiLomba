<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LombaController extends Controller
{
    public function index(Request $request)
    {
        $query = Lomba::query();

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('penyelenggara', 'like', '%' . $request->search . '%');
            });
        }

        // Filters
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('deadline_from')) {
            $query->where('deadline', '>=', $request->deadline_from);
        }

        if ($request->filled('deadline_to')) {
            $query->where('deadline', '<=', $request->deadline_to);
        }

        // Default Sort
        $lombas = $query->orderBy('deadline', 'asc')->paginate(12);

        if ($request->ajax()) {
            return view('mahasiswa.lomba._list', compact('lombas'))->render();
        }

        return view('mahasiswa.lomba.index', compact('lombas'));
    }

    public function show($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('mahasiswa.lomba.show', compact('lomba'));
    }

}

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
        $tab = $request->get('tab', 'aktif');
        $now = Carbon::now()->startOfDay();

        // Base query dengan filter umum
        $baseQuery = Lomba::query();

        if ($request->filled('search')) {
            $baseQuery->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('penyelenggara', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('kategori')) {
            $baseQuery->where('kategori', $request->kategori);
        }

        if ($request->filled('tingkat')) {
            $baseQuery->where('tingkat', $request->tingkat);
        }

        // Hitung total untuk badge tab (tanpa filter search/kategori/tingkat)
        $totalAktif = Lomba::where('deadline', '>=', $now)->where('status', 'buka')->count();
        $totalArsip = Lomba::where('deadline', '<', $now)->count();

        // Query utama berdasarkan tab
        if ($tab === 'arsip') {
            // Lomba yang sudah melewati deadline (semua status)
            $query = (clone $baseQuery)->where('deadline', '<', $now)
                ->orderBy('deadline', 'desc');
        } else {
            // Lomba aktif: deadline >= hari ini DAN status = 'buka' (dikontrol admin)
            $query = (clone $baseQuery)
                ->where('deadline', '>=', $now)
                ->where('status', 'buka')
                ->orderBy('deadline', 'asc');
        }

        $lombas = $query->paginate(16)->appends($request->query());

        if ($request->ajax()) {
            return view('mahasiswa.lomba._list', compact('lombas', 'tab'))->render();
        }

        return view('mahasiswa.lomba.index', compact('lombas', 'tab', 'totalAktif', 'totalArsip'));
    }

    public function show($id)
    {
        $lomba = Lomba::findOrFail($id);
        $isArsip = $lomba->deadline->lt(Carbon::now()->startOfDay());
        return view('mahasiswa.lomba.show', compact('lomba', 'isArsip'));
    }
}

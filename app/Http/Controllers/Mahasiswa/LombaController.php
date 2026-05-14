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

    public function timFinder(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        
        $query = \App\Models\SlotTim::with(['tim.lomba', 'tim.ketua'])
            ->where('status', 'buka')
            ->where('batas_waktu', '>=', now());

        // Filters
        if ($request->filled('lomba_id')) {
            $query->whereHas('tim', function($q) use ($request) {
                $q->where('id_lomba', $request->lomba_id);
            });
        }

        if ($request->filled('kategori')) {
            $query->whereHas('tim.lomba', function($q) use ($request) {
                $q->where('kategori', $request->kategori);
            });
        }

        $slots = $query->latest()->paginate(10);

        // Recommendation Logic
        $recommendations = collect();
        if ($mahasiswa && !empty($mahasiswa->keahlian)) {
            $userSkills = collect($mahasiswa->keahlian);
            
            $allOpenSlots = \App\Models\SlotTim::with(['tim.lomba', 'tim.ketua'])
                ->where('status', 'buka')
                ->where('batas_waktu', '>=', now())
                ->get();

            foreach ($allOpenSlots as $slot) {
                $requiredSkills = collect($slot->keahlian_dibutuhkan);
                if ($requiredSkills->isEmpty()) continue;

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

    public function slotShow($id)
    {
        $slot = \App\Models\SlotTim::with(['tim.lomba', 'tim.ketua.mahasiswa'])->findOrFail($id);
        return view('mahasiswa.tim_finder.show', compact('slot'));
    }
}

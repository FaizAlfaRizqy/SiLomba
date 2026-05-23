<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LombaExport;
use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\Tim;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_mahasiswa' => User::role('mahasiswa')->count(),
            'total_tim' => Tim::count(),
            'total_lomba' => Lomba::where('status', 'buka')->count(),
        ];

        // Distribution by Program Studi
        $prodiDist = Mahasiswa::select('program_studi', DB::raw('count(*) as total'))
            ->groupBy('program_studi')
            ->get();

        // Participation Trends
        $trends = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'data' => [10, 25, 45, 30, 60, 85],
        ];

        return view('admin.dashboard', compact('stats', 'prodiDist', 'trends'));
    }

    public function exportPDF()
    {
        $lombas = Lomba::all();
        $pdf = Pdf::loadView('admin.reports.lomba_pdf', compact('lombas'));

        return $pdf->download('laporan_lomba.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new LombaExport, 'laporan_lomba.xlsx');
    }
}

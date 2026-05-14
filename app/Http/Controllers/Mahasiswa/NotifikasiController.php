<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasis = Notification::where('id_penerima', Auth::id())
            ->latest()
            ->paginate(20);

        return view('mahasiswa.notifikasi.index', compact('notifikasis'));
    }

    public function tandaiBaca($id)
    {
        $notifikasi = Notification::where('id', $id)
            ->where('id_penerima', Auth::id())
            ->firstOrFail();

        $notifikasi->is_read = true;
        $notifikasi->save();

        if ($notifikasi->link) {
            return redirect($notifikasi->link);
        }

        return back();
    }

    public function bacaSemua()
    {
        Notification::where('id_penerima', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca');
    }

    public function unreadCount()
    {
        $count = Notification::where('id_penerima', Auth::id())
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }
}

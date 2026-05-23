<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Notification;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get all teams where user is a member
        $tims = Tim::whereHas('anggota', function ($query) use ($user) {
            $query->where('id_mahasiswa', $user->id);
        })->orWhere('id_ketua', $user->id)
            ->with(['lomba', 'chatMessages' => function ($query) {
                $query->latest()->limit(1);
            }])
            ->get();

        return view('mahasiswa.chat.index', compact('tims'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $tim = Tim::with(['lomba', 'anggota.user', 'anggota.mahasiswa', 'ketua.mahasiswa'])->findOrFail($id);

        // Security Check
        $isMember = $tim->anggota->contains('id_mahasiswa', $user->id) || $tim->id_ketua == $user->id;
        if (! $isMember) {
            return redirect()->route('mahasiswa.chat.index')->with('error', 'Anda bukan anggota tim ini.');
        }

        $messages = ChatMessage::where('id_tim', $tim->id)
            ->with('pengirim.mahasiswa')
            ->oldest()
            ->get();

        $pinnedMessage = ChatMessage::where('id_tim', $tim->id)
            ->where('is_pinned', true)
            ->latest()
            ->first();

        return view('mahasiswa.chat.show', compact('tim', 'messages', 'pinnedMessage'));
    }

    public function kirim(Request $request, $id)
    {
        $user = Auth::user();
        $tim = Tim::findOrFail($id);

        $request->validate([
            'pesan' => 'required|string|max:2000',
        ]);

        $message = ChatMessage::create([
            'id_tim' => $tim->id,
            'id_pengirim' => $user->id,
            'pesan' => $request->pesan,
        ]);

        // Notify other members
        $members = $tim->anggota->pluck('id_mahasiswa')->push($tim->id_ketua)->unique();
        foreach ($members as $memberId) {
            if ($memberId != $user->id) {
                Notification::create([
                    'id_penerima' => $memberId,
                    'judul' => '💬 Pesan baru di '.$tim->nama_tim,
                    'isi' => $user->name.': '.substr($request->pesan, 0, 50),
                    'tipe' => 'chat_baru',
                    'link' => route('mahasiswa.chat.show', $tim->id),
                ]);
            }
        }

        return response()->json(['success' => true, 'pesan' => $message]);
    }

    public function upload(Request $request, $id)
    {
        $user = Auth::user();
        $tim = Tim::findOrFail($id);

        $request->validate([
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        $path = $request->file('file')->store('chat-files/'.$tim->id, 'public');

        $message = ChatMessage::create([
            'id_tim' => $tim->id,
            'id_pengirim' => $user->id,
            'pesan' => $request->file('file')->getClientOriginalName(),
            'file_attachment' => $path,
        ]);

        return response()->json(['success' => true, 'url' => asset('storage/'.$path)]);
    }

    public function pesanBaru(Request $request, $id)
    {
        $since = $request->query('sejak');
        $messages = ChatMessage::where('id_tim', $id)
            ->where('created_at', '>', date('Y-m-d H:i:s', $since / 1000))
            ->with('pengirim.mahasiswa')
            ->get();

        return response()->json([
            'pesan' => $messages,
            'timestamp' => now()->timestamp * 1000,
        ]);
    }

    public function pinPesan($id)
    {
        $message = ChatMessage::findOrFail($id);
        $tim = $message->tim;

        if (Auth::id() != $tim->id_ketua) {
            return response()->json(['success' => false, 'message' => 'Hanya ketua tim yang bisa melakukan pin.'], 403);
        }

        // Unpin all other messages for this team if needed, or allow multiple
        // For simplicity, let's allow only one pinned message
        ChatMessage::where('id_tim', $tim->id)->update(['is_pinned' => false]);

        $message->is_pinned = ! $message->is_pinned;
        $message->save();

        return response()->json(['success' => true, 'pinned' => $message->is_pinned]);
    }
}

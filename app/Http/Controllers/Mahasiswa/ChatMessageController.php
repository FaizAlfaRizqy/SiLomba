<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatMessageController extends Controller
{
    public function index($teamId)
    {
        $tim = Tim::findOrFail($teamId);

        // Ensure user is member
        if (! $tim->anggota()->where('id_mahasiswa', Auth::id())->exists()) {
            abort(403);
        }

        $messages = ChatMessage::where('id_tim', $teamId)
            ->with('sender.mahasiswa')
            ->orderBy('created_at', 'asc')
            ->take(50)
            ->get();

        return response()->json($messages);
    }

    public function store(Request $request, $teamId)
    {
        $tim = Tim::findOrFail($teamId);

        if (! $tim->anggota()->where('id_mahasiswa', Auth::id())->exists()) {
            abort(403);
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = ChatMessage::create([
            'id_tim' => $teamId,
            'id_pengirim' => Auth::id(),
            'message' => $request->message,
        ]);

        return response()->json($message->load('sender.mahasiswa'));
    }
}

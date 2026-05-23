<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_tim', 'id_pengirim', 'pesan', 'file_attachment', 'is_pinned'])]
class ChatMessage extends Model
{
    protected $table = 'chat_message';

    protected function casts(): array
    {
        return [
            'is_pinned' => 'boolean',
        ];
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'id_pengirim');
    }
}

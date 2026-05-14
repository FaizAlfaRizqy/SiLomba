<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['id_slot', 'id_pelamar', 'pesan_motivasi', 'status', 'alasan_penolakan', 'processed_at'])]
class Lamaran extends Model
{
    protected $table = 'lamaran';

    protected function casts(): array
    {
        return [
            'processed_at' => 'datetime',
        ];
    }

    public function slot()
    {
        return $this->belongsTo(SlotTim::class, 'id_slot');
    }

    public function pelamar()
    {
        return $this->belongsTo(User::class, 'id_pelamar');
    }
}

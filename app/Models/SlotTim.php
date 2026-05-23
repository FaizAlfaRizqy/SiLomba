<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_tim', 'posisi', 'keahlian_dibutuhkan', 'jumlah_slot', 'deskripsi', 'batas_waktu', 'status'])]
class SlotTim extends Model
{
    protected $table = 'slot_tim';

    protected function casts(): array
    {
        return [
            'keahlian_dibutuhkan' => 'json',
            'batas_waktu' => 'date',
        ];
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'id_slot');
    }
}

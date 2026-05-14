<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['id_tim', 'id_mahasiswa', 'peran', 'joined_at'])]
class AnggotaTim extends Model
{
    protected $table = 'anggota_tim';

    protected function casts(): array
    {
        return [
            'joined_at' => 'datetime',
        ];
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id', 'nim', 'program_studi', 'domisili', 'keahlian',
    'minat_lomba', 'link_portofolio', 'ketersediaan_waktu',
    'level_privasi', 'foto_profil',
])]
class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected function casts(): array
    {
        return [
            'keahlian' => 'json',
            'minat_lomba' => 'json',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

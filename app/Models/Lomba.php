<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'nama', 'penyelenggara', 'kategori', 'tingkat', 'tanggal_buka', 'deadline',
    'hadiah', 'syarat_peserta', 'deskripsi', 'link_resmi',
    'poster', 'status', 'id_admin',
])]
class Lomba extends Model
{
    use SoftDeletes;

    protected $table = 'lomba';

    protected function casts(): array
    {
        return [
            'tanggal_buka' => 'date',
            'deadline' => 'date',
        ];
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function tims()
    {
        return $this->hasMany(Tim::class, 'id_lomba');
    }
}

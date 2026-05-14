<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'nama', 'penyelenggara', 'kategori', 'tingkat', 'deadline', 
    'hadiah', 'syarat_peserta', 'deskripsi', 'link_resmi', 
    'poster', 'status', 'id_admin'
])]
class Lomba extends Model
{
    use SoftDeletes;

    protected $table = 'lomba';

    protected function casts(): array
    {
        return [
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

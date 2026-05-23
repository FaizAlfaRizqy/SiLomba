<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id_penerima', 'judul', 'isi', 'tipe', 'link', 'is_read'])]
class Notification extends Model
{
    protected $table = 'notifications';

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
}

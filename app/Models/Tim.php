<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama_tim', 'id_lomba', 'id_ketua', 'maks_anggota'])]
class Tim extends Model
{
    protected $table = 'tim';

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'id_lomba');
    }

    public function ketua()
    {
        return $this->belongsTo(User::class, 'id_ketua');
    }

    public function slots()
    {
        return $this->hasMany(SlotTim::class, 'id_tim');
    }

    public function anggota()
    {
        return $this->hasMany(AnggotaTim::class, 'id_tim');
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class, 'id_tim');
    }

    public function checklistItems()
    {
        return $this->hasMany(ChecklistTim::class, 'id_tim');
    }
}

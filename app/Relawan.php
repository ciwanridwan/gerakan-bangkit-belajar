<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    public function anggotas()
    {
        return $this->belongsTo(Anggota::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'province_id');
    }
}

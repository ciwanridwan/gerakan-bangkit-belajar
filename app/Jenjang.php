<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    public function anggotas()
    {
        return $this->hasMany('App\Anggota');
    }
}

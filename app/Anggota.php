<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public function jenjangs()
    {
        return $this->belongsTo('App\Jenjang');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function relawans()
    {
        return $this->hasMany(Relawan::class);
    }

}

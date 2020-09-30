<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

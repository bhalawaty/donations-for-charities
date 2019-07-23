<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    public function charity()
    {
        return $this->belongsTo(Admin::class);
    }

    public function Donates()
    {
        return $this->hasMany(Donate::class);
    }
}

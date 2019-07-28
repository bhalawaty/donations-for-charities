<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('charity', function (Builder $builder) {
            $builder->with('charity');
        });
    }

    public function charity()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function Donates()
    {
        return $this->hasMany(Donate::class);
    }
}

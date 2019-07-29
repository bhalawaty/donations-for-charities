<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user', function (Builder $builder) {
            $builder->with('user');
        });
        static::addGlobalScope('state', function (Builder $builder) {
            $builder->with('state');
        });
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function time($donate)
    {
        $mytime = Carbon::now()->minute;
        $donateTime = $donate->updated_at->minute;
        $diff = $mytime - $donateTime;
        return $diff;
    }


}

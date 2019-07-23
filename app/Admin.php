<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    public function state()
    {
        return $this->hasMany(state::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'id',
        'f_name',
        'l_name',
        'email',
        'address',
        'avatar',
        'sex',
        'rule',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

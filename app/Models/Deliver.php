<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

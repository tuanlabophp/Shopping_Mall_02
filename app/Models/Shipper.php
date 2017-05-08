<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $fillable = [
        'id',
        'name',
        'company',
        'status',
    ];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

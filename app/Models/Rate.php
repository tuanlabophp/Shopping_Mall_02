<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'point',
        'content',
    ];
    protected $timestamp = true;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'poin',
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
}

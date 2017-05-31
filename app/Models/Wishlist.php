<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

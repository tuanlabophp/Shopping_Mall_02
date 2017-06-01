<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'parent_id',
        'content',
        'parent_id',
    ];
    protected $timestamp = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function getUser()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}

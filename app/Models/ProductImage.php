<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'path_origin',
        'path_thumb',
        'is_main',
    ];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}

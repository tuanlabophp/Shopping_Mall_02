<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_technicals');
    }
    
    public function productTechnicals()
    {
        return $this->hasMany(ProductTechnical::class);
    }
}

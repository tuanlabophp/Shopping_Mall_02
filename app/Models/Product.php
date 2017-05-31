<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'price',
        'sale_percent',
        'display_size',
        'quantity',
        'profile',
        'profile_full',
        'description',
        'status',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function technicals()
    {
        return $this->belongsToMany(Technical::class, 'product_technicals');
    }

    public function productTechnicals()
    {
        return $this->hasMany(ProductTechnical::class, 'product_technicals');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 1);
    }

    public function scopeFeature($query)
    {
        return $query->where('status', 2);
    }

    public function scopeTopSale($query)
    {
        return $query->where('sale_percent', '!=', 0);
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }
}

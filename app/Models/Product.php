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
        'display_detail',
        'feature_image',
        'image_list',
        'quantity',
        'guarantee',
        'os_cpu',
        'memory',
        'design',
        'camera',
        'connect',
        'battery',
        'description',
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
        return $this->belongsToMany(Technical::class);
    }

    public function productTechnicals()
    {
        return $this->hasMany(ProductTechnical::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}

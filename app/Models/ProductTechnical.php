<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTechnical extends Model
{
    protected $table = 'product_technicals';
    protected $fillable = [
        'id',
        'product_id',
        'technical_id',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function technicals()
    {
        return $this->belongsTo(Technical::class);
    }
}

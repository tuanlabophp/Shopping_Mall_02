<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'status',
        'note',
        'payment',
        'shipper_id',
        'deliver_id',
    ];
    protected $timestamp = true;

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function delivers()
    {
        return $this->belongsTo(Deliver::class);
    }

    public function shippers()
    {
        return $this->belongsTo(Shipper::class);
    }
}

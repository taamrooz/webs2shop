<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_products()
    {
    	return $this->hasMany(OrderProduct::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*public function order_product()
    {
    	return $this->belongsToMany(OrderProduct::class);
    }*/

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}

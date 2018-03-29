<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}

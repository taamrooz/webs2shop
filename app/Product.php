<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
        'imageurl'
    ];
    public function orders()
    {
    	return $this->belongsToMany(Order::class);
    }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}

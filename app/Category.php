<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function children() {
        return DB::table('categories')->select(DB::raw("SELECT * FROM"));
        return DB::select(DB::raw("SELECT * FROM categories "));
    }
}

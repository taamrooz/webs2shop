<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $primary_key = ['order_id', 'product_id'];


}

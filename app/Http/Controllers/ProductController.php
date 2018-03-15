<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        return view('Product.index');

    }

    public function show(Product $product){

        return view('Product.show', compact('product'));

    }
}

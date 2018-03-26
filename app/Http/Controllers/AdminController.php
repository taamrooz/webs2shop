<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function products()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function categories(){
    	$categories = Category::all();
    	return view('admin.categories.index', compact('$categories'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    public function index() {

        // Check the cart

        // Receive product information

        if(session()->exists('cart')) {
            $products = Product::whereIn('id', array_keys(session()->get('cart')))->get();
        }

        return view('shoppingcart.show', compact('products'));

    }

    public function add() {

        // Check if amount has been given
        if (!request()->has('aantal')) {
            $aantal = 1;
        }else {
            $aantal = request('aantal');
        }

        // Get cart
        if(empty(session()->get('cart'))){
            $cart = array();
        }else{
            $cart = session()->get('cart');
        }

        // Add data to cart
        if (array_key_exists(request('product_id'), $cart)) {

            $cart[request('product_id')] = $cart[request('product_id')] + $aantal;

        }else {

            $cart[request('product_id')] = $aantal;

        }

        // Rewrite cart
        session()->put('cart', $cart);

        // Send user to previous page
        return back();

    }
}

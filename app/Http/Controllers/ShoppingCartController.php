<?php

namespace App\Http\Controllers;

use App\Product;

class ShoppingCartController extends Controller
{

    public function index() {

        // Check the cart
        if(session()->exists('cart')) {
            $products = Product::whereIn('id', array_keys(session()->get('cart')))->get();
        }

        // Give user shopping cart view
        return view('shoppingcart.show', compact('products'));

    }

    public function add() {

        // Get cart
        $cart = $this->getCart();

        // Check if amount has been given
        if (!request()->has('aantal') || request('aantal') < 1) {
            $aantal = 1;
        }else {
            $aantal = request('aantal');
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

    public function remove($id) {

        // Get cart
        $cart = $this->getCart();

        // Remove product from shopping cart
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }

        // Rewrite cart
        session()->put('cart', $cart);

        // Send user back to shopping cart
        return redirect('/winkelwagen');

    }

    public function edit() {

        // Get cart
        $cart = $this->getCart();

        // Remove product from shopping cart
        if (array_key_exists(request()->id, $cart)) {
            $cart[request()->id] = request()->amount;
        }

        // Rewrite cart
        session()->put('cart', $cart);

        // Send user back to shopping cart
        return back();

    }

    public function destroy() {

        // Remove session
        session()->forget('cart');

        // Remove cart from database
        if(auth()->user()->cart->count() > 0) {

            auth()->user()->cart->each->delete();

        }

        // Send user back to shopping cart
        return redirect('/winkelwagen');

    }

    private function getCart(){
        // Get cart
        if(empty(session()->get('cart'))){
            $cart = array();
        }else{
            $cart = session()->get('cart');
        }
        return $cart;
    }
}

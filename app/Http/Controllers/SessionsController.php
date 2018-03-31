<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    // Give permission to use the following functions
    public function __costruct() {

        $this->middleware('guest', ['except' => 'destroy']);

    }

    public function create() {

        return view('/auth.login');

    }

    public function store() {

        // Check if user exsists
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Je gegevens lijken niet te kloppen...'
            ]);
        }

        // Check if user has saved shopping cart
        if(auth()->user()->cart->count() > 0) {

            // Get cart if exists
            if(empty(session()->get('cart'))){

                $cart = array();

            }else{

                $cart = session()->get('cart');

            }

            foreach(auth()->user()->cart as $item){

                // Add data to cart
                if (array_key_exists($item->pr_id, $cart)) {

                    $cart[$item->pr_id] = $cart[$item->pr_id] + $item->amount;

                }else {

                    $cart[$item->pr_id] = $item->amount;

                }

                // Rewrite cart
                session()->put('cart', $cart);
            }
        }

        // Send user to homepage
        return redirect('/');

    }

    public function destroy() {

        // Delete old cart
        auth()->user()->cart->each->delete();

        // Save cart in database
        if(session()->exists('cart')){

            foreach(session()->get('cart') as $item => $value) {
                $cart_item = new ShoppingCart();
                $cart_item->user_id = auth()->id();
                $cart_item->pr_id = $item;
                $cart_item->amount = $value;
                $cart_item->save();
            }
        }

        // Delete cart
        session()->flush('cart');

        auth()->logout();

        return redirect('/');

    }
}

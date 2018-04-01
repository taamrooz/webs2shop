<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;

class RegistrationController extends Controller
{
    //
    public function create() {

        return view('registration.create');

    }

    public function store() {

        // Validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        // Create and save
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // Sign in
        auth()->login($user);

        // Redirect
        return Redirect::to('/');

    }

    public function show() {

        // Check if user is logged in
        if(!auth()->check()){
            return redirect('/');
        }

        // Receive user data
        $user = auth()->user();
        $orders = $user->orders();

        // Return to view
        return view('/auth.account', compact('user', 'orders'));

    }

}

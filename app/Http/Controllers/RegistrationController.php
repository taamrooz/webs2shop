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

    public function store(Request $request) {

        dd(request());

        // Validate
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            're-password' => 'required'
        ]);

        return Redirect::to('/');

        // Create and save
        $user = User::create(request(['username', 'email', 'password']));

        // Sign in
        auth()->login($user);

        // Redirect
        return Redirect::to('/');

    }

}

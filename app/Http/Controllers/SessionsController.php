<?php

namespace App\Http\Controllers;

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

        // Sign user in
        return redirect('/');

    }

    public function destroy() {

        auth()->logout();

        return redirect('/');

    }
}

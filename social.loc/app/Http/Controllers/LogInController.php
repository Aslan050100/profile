<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogInController extends Controller
{
    //
    public function getIndex(){
        return view("sign.logIn");
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/profile/auth()->user()->id');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/signUp');
    }
}

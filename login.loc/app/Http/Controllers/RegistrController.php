<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\User;

class RegistrController extends Controller
{
    //
    public function signup(){
        return view('login.signUp');
    }

    public function index(){
        return view('login.signIn');
    }
    public function successlogin()
    {
        return view('login.successlogin');
    }
    public function getProfile(){
        return view('login.profile');
    }
    public function getToDB(){
        $this->validate(request(),[
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);

        $user = User::create(request(['name','email','password']));

        auth()->login($user);

        return redirect()->to('/');

    }
}

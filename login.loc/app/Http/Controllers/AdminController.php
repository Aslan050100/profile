<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
use DB;
use Auth;

class AdminController extends Controller
{
    //
    public function openAdmin(){
        return view('admins.admin');
    }
    public function check(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );


        $checkLogin = DB::table('admins')->where(['email'=>$user_data['email'],'password'=>$user_data['password']])->get();
        if(count($checkLogin)  >0)
        {
            //dd($user_data);
            return redirect('/adminPage');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }
    public function openAdminPage(){
        $products = Product::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('admins.adminPage',['products'=>$products]);
    }

}

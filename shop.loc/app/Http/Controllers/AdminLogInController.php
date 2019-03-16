<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AdminLogInController extends Controller
{
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
        if(count($checkLogin)  > 0)
        {
            //dd($user_data);
            Session::put('email',$user_data['email']);
            return redirect('/adminPage');
            
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }
    public function open(){
    	Session::forget('email');
    	return view('admin.adminLogIn');
    }
    public function show(){
    	return view('admin.index');
    }
    public function logoutadmin(){
    	Session::forget('email');
    	return view('admin.adminLogIn');
    }
}

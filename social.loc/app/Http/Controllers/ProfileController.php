<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfileController extends Controller
{
    //
    public function getIndex(){
        return view('profile.profile');
    }

    public function logout()
    {
        Auth::logout();
        return view('/');
    }

    public function getPost(){
        if(isset(auth()->user()->name)){
            $my_posts = DB::table('user_'.auth()->user()->name)->orderBy('id', 'desc')->get();
            return view("profile.profile",['my_posts'=>$my_posts]);
        }
        else{
            return redirect()->route('sign.login');
        }
    }

    public function getPhoto(){
        if(isset(auth()->user()->name)){
            $my_posts = DB::table('user_'.auth()->user()->name)->orderBy('id', 'asc')->get();
            return view("profile.profile",['my_posts'=>$my_posts]);
        }
        else{
            return redirect()->route('sign.login');
        }
    }
    public function delete_post($id){
        DB::delete('delete from  user_'.auth()->user()->name . ' where id=?',[$id]);
        return redirect()->to('/profile/{id}');
    }
}

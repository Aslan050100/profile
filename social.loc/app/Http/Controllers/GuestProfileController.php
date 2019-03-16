<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GuestProfileController extends Controller
{
    //
    public function show($id){
    	$users = DB::select('select * from users where id=?',[$id]);
    	$my_posts = DB::table('user_'.$users[0]->name)->orderBy('id', 'desc')->get();
    	return view('profile.guestProfile',['users'=>$users,'my_posts'=>$my_posts]);
    }
}

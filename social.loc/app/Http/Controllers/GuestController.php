<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class GuestController extends Controller
{
    //
    public function getIndex(){
    	return view('guest.guest');
    }

    public function show(){
    	$users = User::all();
    	return view('guest.guest',['users'=>$users]);
    }
}

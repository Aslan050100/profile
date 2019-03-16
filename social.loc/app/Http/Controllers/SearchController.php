<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class SearchController extends Controller
{
    //
    public function searchProfile(Request $request,$id){
        dd($id);
        $name = $request->text_search;
        dd($name);
        return redirect()->to('/profile/{id}');
    }
    public function searchFriends(){
    	$users = User::all();
    	return view('friend.searchFriends',['users'=>$users]);
    }
}

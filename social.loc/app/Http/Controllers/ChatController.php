<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class ChatController extends Controller
{
    //
    public function getIndex(){
    	$friends = Auth::user()->friends();
        return view('friend.friends')->withFriends($friends);
    }

 	public function show($id){
    	$friend = User::find($id);
        return view('friend.chat')->withFriend($friend);
    }
    public function getChat($id){
    	$chats = Chat::where(function ($query) use ($id) {

            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);

        })->orWhere(function ($query) use ($id) {

            $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);

        })->get();



        return $chats;
    } 
    public function sendChat(Request $request) {

        Chat::create([

            'user_id' => $request->user_id,

            'friend_id' => $request->friend_id,

            'chat' => $request->chat

        ]);

        

        return [];

    }
}

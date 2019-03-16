<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $friends = Auth::user()->friends();
        return view('friend.friends')->withFriends($friends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFriend(Request $request)
    {
        //  
        $friend = new Friend;
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $request->friend_id;
        $friend->save();
      
        Session::flash('success','Friend has been added');
        return redirect()->back();
    }

    public function removeFriend(Request $request)
    {
        //  
        $friend_id = $request->friend_id; 
        $user_id = Auth::user()->id;
        DB::delete('delete from friends where friend_id=? and user_id=?',[$friend_id,$user_id]);
       
      
        Session::flash('success','Friend has been removed');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}

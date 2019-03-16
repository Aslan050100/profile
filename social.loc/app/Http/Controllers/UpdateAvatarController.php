<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use App\Http\Requests;
use Auth;
class UpdateAvatarController extends Controller
{
    //
    public function updateAvatar(Request $request){
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->to('/profile/{id}');
    }
}

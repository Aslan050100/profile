<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
class ProfileSettingsController extends Controller
{
    //
    public function getIndex(){
        return view('profile.settingProfile');
    }

    public function edit(Request $request,$id) {
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $city = $request->input('city');
        $gender = $request->input('gender');
        $phone_number = $request->input('phone_number');
        $birthday = $request->input('birthday');
        $bio = $request->input('bio');
        DB::update('update users set  name = ? , email = ? , lastname=?, city=?, genre=?, birthday=?, bio=?, ph_number=? where id = ?',[$name,$email,$lastname,$city,$gender,$birthday,$bio,$phone_number,$id]);
        return redirect()->to('/profile/{id}');
    }
}

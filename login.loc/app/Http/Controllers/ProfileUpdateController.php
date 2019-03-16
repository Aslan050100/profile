<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileUpdateController extends Controller {

    public function edit(Request $request,$id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        DB::update('update users set name = ? , email = ? , password = ? where id = ?',[$name,$email,$password,$id]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/profile/{id}">Click Here</a> to go back.';
    }
}
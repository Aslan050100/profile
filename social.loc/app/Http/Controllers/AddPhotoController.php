<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPhotoController extends Controller
{
    //
   /* public function add_photo(Request $request){

        if($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            Image::make($images)->save(public_path('/assets/img/' . $filename));
        }
        DB::table('user_' . auth()->user()->name)->insert(
            ['img' => $filename]
        );

        return redirect()->to('/profile/{id}');
    }*/
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use DB;
use App\Http\Requests;
use Auth;


class AddPostController extends Controller
{
    //
    public function add_post(Request $request){

        if($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = time() . '.' . $images->getClientOriginalExtension();
            Image::make($images)->save(public_path('/assets/img/' . $filename));
        }
        $text = $request->text;
            DB::table('user_' . auth()->user()->name)->insert(
                ['text' => $text, 'img' => $filename]
            );

        return redirect()->to('/profile/{id}');
    }

}

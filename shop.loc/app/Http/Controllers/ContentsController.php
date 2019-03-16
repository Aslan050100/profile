<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
class ContentsController extends Controller
{
    public function execute(){
        if(Session::get('email') != null){
            if(view()->exists('admin.contents')){
            $contents = Product::all();
            $data = [
                        'title' =>"Продукты",
                        'contents' => $contents
                    ];
            return view('admin.contents',$data);
        }
        abort(404);
        }else{
            return redirect()->route('admin');
        }

    	
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use Session;
class ContentAddController extends Controller
{
    public function execute(Request $request){
        if(Session::get('email') != null){

        	if($request->isMethod('post')){
        		

        		$input = $request->except('_token');

                $messages = [
                    'required'=>"Поле :attribute обязательна для заполнения",
                    'unique'=>"Такое название уже существует"
                ];

        		$validator = Validator::make($input,[

        			'name' => 'required|max:255',
        			'code' => 'required|max:255|unique:products',
        			'price' => 'required|max:255',
        			'types' => 'required|max:255',
        			'text' => 'required',
        			


        		],$messages);

        		if($validator->fails()){
        			return redirect()->route('contentAdd')->withErrors($validator)->withInput();
        		}
        		
        		if($request->hasFile('image'))
        		{
    	    		$file = $request->file('image');
    	    		$input['image'] = $file->getClientOriginalName();

    	    		$file->move(public_path().'/assets/img/products/',$input['image']);
    	  			
    	  			
        		}
        		$product = new Product($input);
                
        		if($product->save()){
        			return redirect('adminPage')->with('status','Контент добавлен');
        		}


        	}


        	if(view()->exists('admin.content_add')){
        		$data = [
        				'title'=>"New Product"
        		];
        		return view('admin.content_add',$data);
        	}
        	abort(404);

        }
        else{
            return redirect()->route('admin');
        }
    }
}

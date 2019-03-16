<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use Session;
class COntentEditController extends Controller
{
    public function execute(Product $content,Request $request){
        if(Session::get('email') != null){
            if($request->isMethod('delete')){
                $content->delete();
                return redirect('adminPage')->with('status','Контент удален'); 
            }

            if($request->isMethod('post')){
                $input = $request->except('_token');
                $validator = Validator::make($input,[
                    'name'=>'required|max:255',
        			'types' => 'required|max:255|unique:products,name,'.$input['id'],
        			'price' => 'required|max:255',
        			'code' => 'required|max:255',
        			'text' => 'required'
        			

                ]);
               
                if($validator->fails()){
                    return redirect()
                            ->route('main',['content'=>$input['id']])
                            ->withErrors($validator);
                }

                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $file->move(public_path().'/assets/img/products',$file->getClientOriginalName());
                    $input['image'] = $file->getClientOriginalName();
                }

                else{
                    $input['image'] = $input['old_image'];    
                }

                    unset($input['old_image']);


                    $content->fill($input);
                    if($content->update()){
                        return redirect('adminPage')->with('status','Контент обновлен');
                    }
            }
        	$old = $content->toArray();
        	if(view()->exists('admin.content_edit')){
        		$data = [
        					'title' =>'Редактирование контента - '.$old['name'],
        					'data' =>$old
        				];
        		return view('admin.content_edit',$data);
        	}
        }
        else{
            return redirect()->route('admin');
        }
    }
}

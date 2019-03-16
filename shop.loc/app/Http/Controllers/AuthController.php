<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Content;
use Session;
class AuthController extends Controller
{
    //
    public function execute(Request $request){
    	if($request->isMethod('post')){

    		
    		$input = $request->except('_token');
    		
    		if(count($input)==0){
    			session(['error' => 'exit']);
    			$contents = DB::table('contents')
                ->orderBy('created_at', 'desc')
                ->get();
            $populars = DB::table('contents')
                ->orderBy('votes', 'desc')
                ->limit(2)
                ->get();
    		$data = [
    				'title'=>'Main Page',
    				'contents' => $contents,
                    'populars' =>$populars,
    		];
    		return redirect()
                        ->route('main');
    		}
    		
    		$validator = Validator::make($input,[
                'email'=>'required|max:255',
    			'password' => 'required|max:255',
            ]);
            if($validator->fails()){
            	
                return redirect()
                        ->route('main')
                        ->withErrors($validator);
            }
            
            $email = DB::table('guests')
            	->where('email',$input['email'])
            	->first();
            
            if($email==null)
                session(['error' => 'error']);
            else if($email->password != $input['password'])
           		session(['error' => 'error']);

           	else {
    			session(['error' => 'no','name'=>$input['email']]);
                session(['pass' => 'yes']);
            }
    		$contents = DB::table('contents')
                ->orderBy('created_at', 'desc')
                ->get();
            $populars = DB::table('contents')
                ->orderBy('votes', 'desc')
                ->limit(2)
                ->get();
    		$data = [
    				'title'=>'Main Page',
    				'contents' => $contents,
                    'populars' =>$populars,
    		];
    		return redirect()
                        ->route('main');
    	}
    }
}

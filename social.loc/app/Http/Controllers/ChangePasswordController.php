<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Crypt;
class ChangePasswordController extends Controller
{
    //
    public function changePassword(Request $request,$id){
    	/*$old_password = $request->input('old_pass');
    	$de_old_password = Crypt::decryptString($old_password);
    	$pass = DB::select('select password from users where id = ?',[$id]);
    	$de_pass = Crypt::decryptString($pass[0]->password);
    	dd($de_old_password);*/
    	//if($de_old_password == $de_pass){
    		$new_pass = $request->input('new_pass');
     	    $new_pass = bcrypt($new_pass);
        	DB::update('update users set  password = ? where id = ?',[$new_pass,$id]);
        	return redirect()->to('/profile/{id}');
    	/*}
    	else{
    		dd(12345);
    		return redirect()->back();	
    	}*/
    	
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use App\User;
use Schema;

class SignUpController extends Controller
{
    //

    public function getIndex(){
        return view("sign.index");
    }
    public function getToDB(Request $request){
        if($request->isMethod('post')){
            $name = $request->name;
            $lastname = $request->lastname;
            $email = $request->email;
            $ph_number = $request->ph_number;
            $genre = $request->genre;
            $birthday = $request->birthday;
            $city=$request->city;
            $country = $request->country;
            $password = $request->password;
            $password = bcrypt($password);
            DB::table('users')->insert(
                ['name' => $name, 'lastname' =>$lastname,'email'=>$email,'ph_number'=>$ph_number,'genre'=>$genre,'birthday'=>$birthday,'city'=>$city,'country'=>$country,'password'=>$password]
            );
            //create table for user

            Schema::connection('mysql')->create('user_'.$name, function($table)
            {
                $table->increments('id');
                $table->text('text');
                $table->string('img',255);
                $table->integer('like')->default(0);
                $table->timestamps();
            });


            return redirect()->to('/logIn');
        }
        return view("sign.index");
    }

}


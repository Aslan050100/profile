<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use \Cart;
use DB;
class mailController extends Controller
{
    //
    public function send(Request $request){
       
        $name = $request->name;
        $surname = $request->surname;
        $address = $request->address;
        $mobile = $request->mobile;
        $email = $request->email;
        $fullname = $name . " " . $surname; 
        $products = Cart::getContent();
        if(auth()->check()){
        foreach($products as $k=>$product){

        $user = Auth()->user()->name;

        DB::table('order')->insert(
            ['name' => $product->name, 'code'=>$product['attributes']->code,'quantity' =>$product->quantity,
            'price' =>$product->price,'total' =>$product->price * $product->quantity,'user'=>$user]
        );}
        }
        $total = Cart::getTotal();
    	$data = [
           'products' => $products,
           'total' =>$total,
           'name' => $name,
           'surname' => $surname,
           'address' => $address,
           'mobile' => $mobile,
           'email' => $email,
           'fullname' => $fullname,
			];

            
    	Mail::send('mail',["data"=>$data],function($message) use ($data){
    		$message->to('210899amantay210899@gmail.com','To Amantay')->subject('Заказ');
    		$message->from($data['email'],$data['fullname']);
    	});
        return redirect()->route('empty_basket');
    }
}

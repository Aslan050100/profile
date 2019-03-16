<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use \Cart;
class BasketController extends Controller
{
    //
    public function execude(){
    	$products = Cart::getContent();
    	$total_qty = Cart::getTotalQuantity();
    	$total = Cart::getTotal();
    	$data = [
    			'products'=>$products,
    			'total_qty' =>$total_qty,
    			'total' => $total,
    	];

    	return view('basket',$data);
    }
    public function add_basket(Request $request){
    	$id = $request->id;
    	$code = $request->code;
    	$name = $request->name;
    	$text = $request->text;
    	$price = $request->price;
    	$image = $request->image;
    	$quantity = $request->quantity;

    	if(Cart::get($id) !== null){
    		Cart::remove($id);
    	}
    	Cart::add($id,$name,$price,$quantity,array('image'=>$image,'code'=>$code));
        $total_qty = Cart::getTotalQuantity();
    	$response = array(
          'status' => 'success',
          'total_qty' => $total_qty,
      );
      return response()->json($response);  
    }
    public function empty_basket(){

    	Cart::clear();
    	return redirect()->route('basket');
    }
    public function delete_basket($id){
    	
    	Cart::remove($id);
        $total = Cart::getTotal();
        $total_qty = Cart::getTotalQuantity();

    	$response = array(
          'status' => 'success',
          'id' => $id,
          'total' =>$total,
          'total_qty'=>$total_qty,
      );
      return response()->json($response);  
    }

    public function update_basket(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $cart = Cart::get($id);
        $q = $cart->quantity;
        Cart::update($id,array('quantity'=>-$q + $quantity));
        $cart = Cart::get($id);
        $total_qty = Cart::getTotalQuantity();
        $response = array(
          'status' => 'success',
          'cart' => $cart,
          'id' =>$id,
          't_q' =>$total_qty,
      );
        return response()->json($response); 
    }

    public function fill(){
      $total_qty = Cart::getTotalQuantity();
      $data = [
          'total_qty'=>$total_qty,
      ];
      return view('order-page',$data);
    }



















}

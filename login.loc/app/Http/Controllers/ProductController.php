<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class ProductController extends Controller
{
    //

    public function getIndex(){
    	$products = Product::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
    	return view('shop.index',['products'=>$products,'totalPiece'=>$cart->totalQty]);
    	   }
	
   	public function getAddToCart(Request $request, $id){
   			$product = Product::find($id);
   			$oldCart = Session::has('cart') ? Session::get('cart'): null;
   			$cart = new Cart($oldCart);
   			$cart->add($product,$product->id);

   			$request->session()->put('cart',$cart);
   			return redirect()->route('product.index');
   	}

    public function logout()
    {
        Auth::logout();
        return redirect('shop.index');
    }
}

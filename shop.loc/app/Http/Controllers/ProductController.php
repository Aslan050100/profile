<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use \Cart;
use App\Comment;
use DB;
class ProductController extends Controller
{
    //
    public function execude($category = "all"){

    	
    	$types = Product::distinct()->get(['types']);
        $total_qty = Cart::getTotalQuantity();
    	if($category == "all")
    		$products = Product::paginate(2);
    	else 
    		$products = Product::where('types',$category)->paginate(2);
    	$data = [
    			'products'=>$products,
    			'types'=>$types,
    			'category'=>$category,
                'total_qty' =>$total_qty,
    	];

    	return view('welcome',$data);
    }

    public function product($code){
    	$product = Product::where('code',$code)->first();
     
        $total_qty = Cart::getTotalQuantity();
    	$data = [
    			'product'=>$product,
                'total_qty' =>$total_qty,
               
    	];
    	return view('product',$data);

    }
    public function search_get($word){
        $products = Product::get();
        //dd($products);
        $search_products = [];
        foreach ($products as $key => $product) {
            $name = $product->name;
            $text = $product->text;
            if(stripos($name, $word) !== False or stripos($text, $word) !== False){
                array_push($search_products, $product);
            }
        }
        $total_qty = Cart::getTotalQuantity();
        $count = count($search_products);
        $data = [
                'products'=>$search_products,
                'total_qty' =>$total_qty,
                'count' =>$count,
        ];
        return view('searched',$data);
    }
    public function search(Request $request){
        $search = $request->text;
        return redirect()->route('search_get',['word'=>$search]);
        
    }

 public function profile(){

        return view('profile');

    }

    public function profile2(){

        $products = DB::table('order')
        ->select(DB::raw('created_at'))
        ->distinct()->where('user',Auth()->user()->name)
        ->get();
        
        $data = [
            'products' =>$products,
        ];
      
        return view('profile2',$data);

    }

    public function profile3($created_at){

        $products = DB::table('order')
        ->select(DB::raw('name,quantity,price,total'))
        ->where('created_at', $created_at)
        ->get();

        $data = [
            'products' =>$products,
        ];

        return view('profile3',$data);
    }

    public function set1(){
    
        return view('set');

    }


}

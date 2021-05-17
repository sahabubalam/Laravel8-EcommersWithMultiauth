<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Cart;

class CartController extends Controller
{
    //cart 
    public function AddCart(Request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        //return Product::find($request->id);

        $data=array();
        $data['id']=$product->id;
        $data['name']=$product->product_name;
        $data['qty']=$request->product_quantity;
        $data['price']=$product->price;
        $data['weight']=1;
        $data['options']['image']=$product->image;
      // return response()->json($data);
       Cart::add($data);
       $request->session()->flash('message','Cart added successfully');
       return back();
    }
    public function showcart()
    {
        $content=Cart::content();
       // return response()->json($content);
        return view('frontend.show-cart',compact('content'));
    }
    public function shippingCart()
    {
        return view('frontend.shipping-cart');
    }
}

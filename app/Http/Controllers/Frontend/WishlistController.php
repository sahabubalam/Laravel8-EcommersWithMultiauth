<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Product;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function addWishlist(Request $request,$id)
    {
        $check=DB::table('wishlists')->where('product_id',$id)->first();
        if($check)
        {
            $request->session()->flash('message','Wishlist Already Added');
            return back();
        }
        $wishlist=new Wishlist();
        $wishlist->user_id=Auth::user()->id;
        $wishlist->product_id=$id;
        $wishlist->save();
        $request->session()->flash('message','Wishlist added successfully');
        return back();
       
        
    }
    public function Wishlist()
    {
        
        $wishlist=Wishlist::all();
        return view('frontend.wishlist',compact('wishlist'));
    }
    public function addCart($id)
    {
        $wishlist=Wishlist::find($id);
        $id= $wishlist->product_id;
        // dd( $id);
        $product=Product::find( $id);
      
        $s=$product->size_id;
        $c=$product->color_id;

        $size=DB::table('products')
        ->join('sizes','sizes.id','products.size_id')
        ->join('colors','colors.id','products.color_id')
        ->select('sizes.*','colors.*')
        ->where('sizes.id','=',$s)
        ->orwhere('colors.id','=',$c)
        ->first();
        $product_details=Product::find($id);
       // return response()->json($product);
        return view('frontend.product-details',compact('product','product_details','size'));
    }
}

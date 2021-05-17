<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;

class CategoryController extends Controller
{
    //
    public function productByCategory($id)
    {
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->select('products.*')
        ->where('products.category_id','=',$id)
        ->get();
       
        $new_product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->select('products.*')
        ->where('products.category_id','=',$id)
        ->where('products.is_featured','=','1')
        ->get();
       // return response()->json($product);
        return view('frontend.productbycategory',compact('product','new_product'));
    }
    //product details
    public function productDetails($id)
    {
       
        $product=Product::find($id);
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use DB;
use App\Models\File;

class ProductController extends Controller
{
    //product list
    public function index()
    {
    
        $product=Product::all();
        return view('admin.product.product-list',compact('product'));
    }
    //add product view
    public function addProduct()
    {
        $category=Category::all();
        $size=Size::all();
        $color=Color::all();
        return view('admin.product.add-product',compact('size','color','category'));
    }
    //inert product
    public function productInsert(Request $request)
    {
       
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'price' => 'required',
            'qty' => 'required',
           // 'photo' => 'required', 
            
            
        ]);
        $product=new Product();
        $product->category_id=$request->category_id;
        $product->color_id=$request->color_id;
        $product->size_id=$request->size_id;
        $product->product_name=$request->product_name;
        $product->brand=$request->brand;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->qty=$request->qty;
        $product->slug=$request->slug;
        $product->status=1;
        $image=$request->file('file');
     
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('products'),$imagename);
            $product->image=$imagename;
            $product->save();
            //return response()->json($product);
            $request->session()->flash('message','Product inserted successfully');
            return redirect('/admin/product-list');
        }
        $product->save();
        //return response()->json($product);
        $request->session()->flash('message','Product inserted successfully');
        return redirect('/admin/product-list');
    }
    //product delete
    public function delete(Request $request,$id)
    {
        $product=Product::find($id);
        $image=$product->image;
        if($image)
        {
            unlink(public_path('products').'/'.$product->image);
        
            $product->delete();
            $request->session()->flash('message','Product deleted successfully');
            return redirect('/admin/product-list');
        }
        $emplproductoyee->delete();
        $request->session()->flash('message','Product deleted successfully');
        return redirect('/admin/product-list');
    }
    //edit product view
    public function editproduct($id)
    {
        $product=Product::find($id);
        $category=Category::all();
        $size=Size::all();
        $color=Color::all();
        return view('admin.product.edit-product',compact('product','category','size','color'));
    }
    //update product
    public function productUpdate(Request $request)
    {
        // echo '<pre>';
        // print_r($request->post());
        // die();


        $product=Product::find($request->id);
        $product->category_id=$request->category_id;
        $product->color_id=$request->color_id;
        $product->size_id=$request->size_id;
        $product->product_name=$request->product_name;
        $product->brand=$request->brand;
        $product->short_description=$request->short_description;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->qty=$request->qty;
        $product->slug=$request->slug;
        $product->status=1;
        $image=$request->file('file');
        $model=$product->id;
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('products'),$imagename);
            $product->image=$imagename;
            unlink(public_path('products').'/'.$request->old_image);
            $product->save();
            //return response()->json($product);
        //    $request->session()->flash('message','Product inserted successfully');
        //     return redirect('/admin/product-list');
        }
           $product->save();
           //return response()->json($product);
           

           //product aatr iimages
           $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image'
            ]);
           
            $files = [];
            if($request->hasfile('filenames'))
            {
                foreach($request->file('filenames') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('files'), $name);  
                    $files[] = $name;  
                }
            }

            $file= new File();
            $file->filenames = $files;
            $file->product_id=$model;
            //return response()->json($file);
            $file->save();
            $request->session()->flash('message','Product inserted successfully');
           return redirect('/admin/product-list');

    }
}

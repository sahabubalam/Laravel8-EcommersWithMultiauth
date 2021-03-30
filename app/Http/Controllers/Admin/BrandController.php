<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class BrandController extends Controller
{
    //brand list
    public function index()
    {
        $brand=Brand::all();
        return view('admin.brand.brand-list',compact('brand'));
    }
    //add brand view
    public function addBrand()
    {
        return view('admin.brand.add-brand');
    }
    //insert brand
    public function brandInsert(request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands',
        ]);
        $brand=new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->status=1;
        $image=$request->file('file');
     
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('brands'),$imagename);
            $brand->image=$imagename;
            $brand->save();
            //return response()->json($brand);
            $request->session()->flash('message','Brand inserted successfully');
            return redirect('/admin/brand-list');
        }
        $brand->save();
        //return response()->json($brand);
        $request->session()->flash('message','Brand inserted successfully');
        return redirect('/admin/brand-list');
    }
    //brand delete
    public function delete(Request $request,$id)
    {
        $brand=Brand::find($id);
        $image=$brand->image;
        if($image)
        {
            unlink(public_path('brands').'/'.$brand->image);
            $brand->delete();
            $request->session()->flash('message','Brand deleted successfully');
            return redirect('/admin/brand-list');
        }
        $brand->delete();
        $request->session()->flash('message','Brand deleted successfully');
        return redirect('/admin/brand-list');
    }
    //edit brand view
    public function editBrand($id)
    {
        $brand=Brand::find($id);
        return view('admin.brand.edit-brand',compact('brand'));
    }
    //brand update
    public function brandUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,'.$request->post('id'),
        ]);
        $brand=Brand::find($request->id);
        $brand->brand_name=$request->brand_name;
        $brand->status=1;
        $image=$request->file('file');
     
        if($image)
        {
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('brands'),$imagename);
            $brand->image=$imagename;
            unlink(public_path('brands').'/'.$request->old_image);
            $brand->save();
            //return response()->json($brand);
            $request->session()->flash('message','Brand inserted successfully');
            return redirect('/admin/brand-list');
        }
        $brand->save();
        //return response()->json($brand);
        $request->session()->flash('message','Brand inserted successfully');
        return redirect('/admin/brand-list');
    }
     //status update
     public function status(Request $request,$status,$id)
     {
         $model=Brand::find($id);
         $model->status=$status;
         $model->save();
         $request->session()->flash('message','Brand status updated');
         return redirect('/admin/brand-list');
     }

}

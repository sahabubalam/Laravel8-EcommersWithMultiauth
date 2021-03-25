<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    
   // coupon list
    public function index()
    {
        $coupon=Coupon::all();
        return view('admin.coupon.coupon-list',compact('coupon'));
    }
    //manage coupon
    public function addCoupon()
    {
        return view('admin.coupon.add-coupon');
    }
    //coupon insert
    public function couponInsert(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons',
            'value'=>'required',
        ]);
        $model= new Coupon();
        $model->title=$request->title;
        $model->code=$request->code;
        $model->value=$request->value;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','Coupon inserted');
        return redirect('/admin/coupon-list');
    }
    //coupon delete
    public function delete(Request $request,$id)
    {
        $model=Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon deleted');
        return redirect('/admin/coupon-list');
    }
    //edit coupon view
    public function editCoupon(Request $request,$id)
    {
        $coupon=Coupon::find($id);
        return view('admin.coupon.edit-coupon',compact('coupon'));
    }
    //update coupon
    public function couponUpdate(Request $request)
    {
        //$coupon=Coupon::find($request->id);
        $validated = $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id'),
            'value'=>'required',
        ]);
        $model= Coupon::find($request->id);
        $model->title=$request->title;
        $model->code=$request->code;
        $model->value=$request->value;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','Coupon updated');
        return redirect('/admin/coupon-list');
    }
    //status update
    public function status(Request $request,$status,$id)
    {
        $model=Coupon::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Coupon status updated');
        return redirect('/admin/coupon-list');
    }
}

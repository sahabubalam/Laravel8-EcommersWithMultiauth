<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    //size list
    public function index()
    {
        $size=Size::all();
        return view('admin.size.size-list',compact('size'));
    }
    //add size view
    public function addSize()
    {
        return view('admin.size.add-size');
    }
    //size insert
    public function sizeInsert(Request $request)
    {
        $validated = $request->validate([
            'size'=>'required|unique:sizes',
        ]);
        $model= new Size();
        $model->size=$request->size;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','size inserted');
        return redirect('/admin/size-list');
    }
    //size delete
    public function delete(Request $request,$id)
    {
        $model=Size::find($id);
        $model->delete();
        $request->session()->flash('message','Size deleted');
        return redirect('/admin/size-list');
    }
    //edit size view
    public function editSize($id)
    {
        $size=Size::find($id);
        return view('admin.size.edit-size',compact('size'));
    }
    //update size
    public function sizeUpdate(Request $request)
    {
        $validated = $request->validate([
            'size'=>'required|unique:sizes,size,'.$request->post('id'),
        ]);
        $model=Size::find($request->id);
        $model->size=$request->size;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','size updated');
        return redirect('/admin/size-list');
    }
    //status update
    public function status(Request $request,$status,$id)
    {
        $model=Size::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Size status updated');
        return redirect('/admin/size-list');
    }
}

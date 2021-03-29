<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    //color list
    public function index()
    {
        $color=Color::all();
        return view('admin.color.color-list',compact('color'));
    }
    //add color
    public function addColor()
    {
        return view('admin.color.add-color');
    }
    //color insert
    public function colorInsert(Request $request)
    {
        $validated = $request->validate([
            'color'=>'required|unique:colors',
        ]);
        $model= new Color();
        $model->color=$request->color;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','Color inserted');
        return redirect('/admin/color-list');
    }
    //color delete
    public function delete(Request $request,$id)
    {
        $model=Color::find($id);
        $model->delete();
        $request->session()->flash('message','Color deleted');
        return redirect('/admin/color-list');
    }
    //edit color view
    public function editColor($id)
    {
        $color=Color::find($id);
        return view('admin.color.edit-color',compact('color'));
    }
    //update color
    public function colorUpdate(Request $request)
    {
        $validated = $request->validate([
            'color'=>'required|unique:colors,color,'.$request->id,
        ]);
        $model=Color::find($request->id);
        $model->color=$request->color;
        $model->status=1;
        $model->save();
       // return response()->json($model);
        $request->session()->flash('message','Color updated');
        return redirect('/admin/color-list');
    }
    //status update
    public function status(Request $request,$status,$id)
    {
        $model=Color::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Color status updated');
        return redirect('/admin/color-list');
    }
}

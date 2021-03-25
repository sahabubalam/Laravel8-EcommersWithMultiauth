<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //category list
    public function index()
    {
        $category=Category::all();
        return view('admin.category.category-list',compact('category'));
    }
    //add category view
    public function addCategory()
    {
        return view('admin.category.add-category');
    }
    //insert category
    public function categoryInsert(Request $request)
    {
        $validated = $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories',
        ]);
        $model= new Category();
        $model->category_name=$request->category_name;
        $model->category_slug=$request->category_slug;
        $model->status=1;
        $model->save();
        //return response()->json($model);
        $request->session()->flash('message','Category inserted');
        return redirect('/admin/category-list');

    }
    //delete category
    public function delete(Request $request,$id)
    {
        $model=Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('/admin/category-list');
    }
    //edit category view
    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit-category',compact('category'));
    }
    //category update
    public function categoryUpdate(Request $request)
    {
        $validated = $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);
        $model= Category::find($request->id);
        $model->category_name=$request->category_name;
        $model->category_slug=$request->category_slug;
        $model->status=1;
        $model->save();
        //return response()->json($model);
        $request->session()->flash('message','Category updated');
        return redirect('/admin/category-list');
    }
    //status update
    public function status(Request $request,$status,$id)
    {
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('/admin/category-list');
    }

}

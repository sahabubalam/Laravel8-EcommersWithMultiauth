<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    //
    public function index()
    {
        return view('admin.product.imageUpload');
    }
    public function list()
    {
        $data=File::all();
        return view('admin.product.list',compact('data'));
    }
    public function store(Request $request)
    {
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
         $file->save();
  
       // return back()->with('success', 'Data Your files has been successfully added');
        $request->session()->flash('message','Data Your files has been successfully added');
        return redirect('/admin/file-list');
    }
    public function editFile($id)
    {
        $id=base64_decode($id);
        $data=File::find($id);
        return view('admin.product.edit-file',compact('data'));
    }
    public function fileUpdate(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image'
    ]);
    $files = [];
   
    //$image=$file->filenames;
   
    if(request()->hasfile('filenames'))
     {
         
        foreach($request->file('filenames') as $file)
        {
            
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('files'), $name);  
            $files[] = $name; 
            $file=File::find($request->id);
            $file->filenames = $files;
            $file->save();  
            //return response()->json($file);
        }

    }
   
   // return back()->with('success', 'Data Your files has been successfully added');
   $request->session()->flash('message','Data Your files has been successfully updated');
   return redirect('/admin/file-list');

    }
    public function delete(Request $request,$id)
    {
        $id=base64_decode($id);
        $file=File::find($id);
        $images=json_decode($file->filenames);
    
        foreach ($images as $image){ 
     
            unlink(public_path('files').'/'.$image);
      }
      $file->delete();
      $request->session()->flash('message','File deleted successfully');
      return redirect('/admin/file-list');
    }
}

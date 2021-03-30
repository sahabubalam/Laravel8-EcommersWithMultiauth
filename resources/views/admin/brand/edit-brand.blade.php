@extends('layouts.admin')
@section('page_title','Edit-Brand')

@section('admin_content')
<div class="content-wrapper mt-5">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row d-felx justify-content-center">
          <!-- left column -->
          <div class="col-md-10 ">
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
             
              <form method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" class="form-control" value="{{$brand->id}}" >
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Brand Name</label>
                        <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control @error('brand_name') is-invalid @enderror" id="image">
                        @error('brand_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                 
                  <div class="form-group">
                    <div class="upload-img">
                        <img id="img" style="max-width:100px;" src="{{asset('brands')}}/{{$brand->image}}" alt="doctor photo">
                    </div>
                    <input type="file" name="file" class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror  
                </div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 ">
                      <input type="hidden" name="old_image" class="form-control" value="{{$brand->image}}" >
                    </div>
                </div>
               
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          
            </div>
          
          <div class="col-md-6">

          </div>
        </div>
       
      </div>
    </section>
  </div>
  @endsection
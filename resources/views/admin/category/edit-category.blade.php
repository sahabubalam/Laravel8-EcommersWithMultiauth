@extends('layouts.admin')
@section('page_title','Edit-Category')
@section('admin_content')
<div class="content-wrapper mt-5">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row d-felx justify-content-center">
          <!-- left column -->
          <div class="col-md-8 ">
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
             
              <form method="POST" action="{{route('category.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Category name">
                    @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">category Slug</label>
                    <input type="text" name="category_slug" value="{{$category->category_slug}}" class="form-control @error('category_slug') is-invalid @enderror" id="category_slug" placeholder="Category slug">
                    @error('category_slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
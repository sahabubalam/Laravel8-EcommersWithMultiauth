@extends('layouts.admin')
@section('page_title','Add-Product')

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
                <h3 class="card-title">Add Product</h3>
              </div>
             
              <form method="POST" action="{{route('product.insert')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2" name="category_id" style="width: 100%;">
                        <option >select</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label>Color</label>
                    <select class="form-control select2" name="color_id" style="width: 100%;">
                    <option >select</option>
                    @foreach ($color as $item)
                    <option value="{{$item->id}}">{{$item->color}}</option>
                
                    @endforeach
                    
                    </select>
                    @error('color_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                 </div>
                  <div class="form-group">
                        <label>Size</label>
                        <select class="form-control select2" name="size_id" style="width: 100%;">
                        <option>select</option>
                        @foreach ($size as $item)
                        <option value="{{$item->id}}">{{$item->size}}</option>
                        @endforeach
                       
                        
                        </select>
                        @error('size_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="category_slug" placeholder="price">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Qty</label>
                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="quantity">
                                @error('qty')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Slug</label>
                                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="brand">
                                @error('brand')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Name</label>
                        <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="image">
                        @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">Short Description</label>
                        <textarea type="text" name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description">

                        </textarea>   
                        @error('short_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="short_description">

                    </textarea>   
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="file" class="form-control @error('image') is-invalid @enderror" id="image">
                    @error('image')
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
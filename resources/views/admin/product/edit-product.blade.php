@extends('layouts.admin')
@section('page_title','Add-Product')

@section('admin_content')
<div class="content-wrapper mt-5">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
             
              <form method="POST" action="{{route('product.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="card-body">
                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2" name="category_id" style="width: 100%;">
                        <option >select</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}" <?php if($item->id==$product->category_id) echo "selected"; ?>>{{$item->category_name}}</option>
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
                    <option value="{{$item->id}}" <?php if($item->id==$product->color_id) echo "selected"; ?>>{{$item->color}}</option>
                
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
                        <option value="{{$item->id}}" <?php if($item->id==$product->size_id) echo "selected"; ?>>{{$item->size}}</option>
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
                                <input type="text" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" id="category_slug" placeholder="price">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Qty</label>
                                <input type="text" name="qty" value="{{$product->qty}}" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="quantity">
                                @error('qty')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Slug</label>
                                <input type="text" name="slug"  value="{{$product->slug}}" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug">
                                @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand</label>
                                <input type="text" name="brand"  value="{{$product->brand}}" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="brand">
                                @error('brand')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Product Name</label>
                        <input type="text" name="product_name"  value="{{$product->product_name}}" class="form-control @error('product_name') is-invalid @enderror" id="image">
                        @error('product_name')
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
                    <div class="item form-group">
                        
                      <div class="col-md-6 col-sm-6 ">
                        <input type="hidden" name="old_image" class="form-control" value="{{$product->image}}" >
                      </div>
                    </div>

                  <div class="form-group">
                        <label for="exampleInputPassword1">Short Description</label>
                        <textarea type="text" value="{{$product->short_description}}" name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description">

                        </textarea>   
                        @error('short_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1"> Description</label>
                    <textarea type="text" alue="{{$product->description}}" name="description" class="form-control @error('description') is-invalid @enderror" id="short_description">

                    </textarea>   
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                 
                </div>

<!--multiple image-->

                <div class="card-header">
                    <h3 class="card-title">Add Multiple Image</h3>
                </div>
               
                  <div class="input-group realprocode control-group lst increment" >
                    <input type="file" name="filenames[]" class="myfrm form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"> <i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="realprocode control-group lst input-group" style="margin-top:10px">
                      <input type="file" name="filenames[]" class="myfrm form-control">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                  </div>
                
                  {{-- <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button> --}}
                
            
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

<script>
 $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".realprocode").remove();
      });
    });
</script>
  @endsection
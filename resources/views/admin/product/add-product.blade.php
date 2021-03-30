@extends('layouts.admin')
@section('page_title','Add-Product')

@section('admin_content')
<style>
  p:empty {
  display: none;
} 
</style>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<div class="content-wrapper mt-5">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row d-felx justify-content-center">
          <!-- left column -->
          <div class="col-md-10">
           
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
             
              <form method="POST" action="{{route('product.insert')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" style="width: 100%;">
                        <option selected="true" disabled>select</option>
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
                    <select class="form-control select2 @error('color_id') is-invalid @enderror" name="color_id" style="width: 100%;">
                    <option selected="true" disabled>select</option>
                    @foreach ($color as $item)
                    <option value="{{$item->id}}">{{$item->color}}</option>
                
                    @endforeach
                    </select>
                    @error('color_id')
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
                                <select class="form-control select2 @error('brand_id') is-invalid @enderror" name="brand_id" style="width: 100%;">
                                  <option selected="true" disabled>select</option>
                                  @foreach ($brand as $item)
                                  <option value="{{$item->id}}">{{$item->brand_name}}</option>
                                  @endforeach
                                  </select>
                                @error('brand_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Lead Time</label>
                              <input type="text" name="lead_time" class="form-control @error('lead_time') is-invalid @enderror" id="category_slug" placeholder="lead time">
                              @error('lead_time')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>



                          {{-- <div class="form-group">
                            <label>Date:</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div> --}}

                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="exampleInputPassword1">Featured</label>
                              <select class="form-control select2 @error('is_featured') is-invalid @enderror" name="is_featured" style="width: 100%;">
                                <option selected="true" disabled>select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                               
                                @error('is_featured')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                              </select>
                              @error('is_featured')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                            <label>Discount</label>
                            <select class="form-control select2 @error('is_discounted') is-invalid @enderror" name="is_discounted" style="width: 100%;">
                              <option selected="true" disabled>select</option>
                              <option value="1">1</option>
                              <option value="0">0</option>
                             
                              @error('is_discounted')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </select>
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Size</label>
                          <select class="form-control select2 @error('size_id') is-invalid @enderror" name="size_id" style="width: 100%;">
                          <option selected="true" disabled>select</option>
                          @foreach ($size as $item)
                          <option value="{{$item->id}}">{{$item->size}}</option>
                          @endforeach
                         
                          
                          </select>
                          @error('size_id')
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
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description">

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
  <script type="text/javascript">
 
   CKEDITOR.replace("short_description");
    CKEDITOR.replace("description");
  
</script>
  @endsection
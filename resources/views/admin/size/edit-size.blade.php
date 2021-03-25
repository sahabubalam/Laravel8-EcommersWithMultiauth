@extends('layouts.admin')
@section('page_title','Add-Coupon')
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
                <h3 class="card-title">Add Coupon</h3>
              </div>
             
              <form method="POST" action="{{route('size.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{$size->id}}" class="form-control">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Add size</label>
                    <input type="text" name="size" value="{{$size->size}}" class="form-control @error('size') is-invalid @enderror" placeholder="size">
                    @error('size')
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
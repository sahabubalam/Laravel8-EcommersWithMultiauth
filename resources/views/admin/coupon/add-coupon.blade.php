@extends('layouts.admin')
@section('page_title','Add-Coupon')
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
                <h3 class="card-title">Add Coupon</h3>
              </div>
             
              <form method="POST" action="{{route('coupon.insert')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="category_name" placeholder="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="category_slug" placeholder="code">
                    @error('code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Value</label>
                    <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="category_slug" placeholder="value">
                    @error('value')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Type </label>
                  <select class="form-control @error('type') is-invalid @enderror" name="type">
                    <option selected="true" disabled>select</option>
                    <option value="value">Value</option>
                    <option value="percent">Percent</option>
                  </select>
                  @error('type')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Min Order Amount</label>
                  <input type="text" name="min_order_amount" class="form-control @error('min_order_amount') is-invalid @enderror" id="category_slug" placeholder="value">
                  @error('min_order_amount')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Is One Time </label>
                <select class="form-control @error('is_one_time') is-invalid @enderror" name="is_one_time">
                  <option selected="true" disabled>select</option>
                  <option value="1">YES</option>
                  <option value="0">NO</option>
                </select>
                @error('is_one_time')
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
@extends('layouts.admin')
@section('page_title','Coupon')
@section('admin_content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            @if(session('message'))
            <div class="alert alert-info" role="alert">
              {{session('message')}}
            </div>
            @endif

            <h1>Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="btn btn-primary" href="/admin/add-coupon">Add Coupon</a>
              </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No </th>
                    <th>Title</th>
                    <th>Code </th>
                    <th>value </th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <?php $i=1 ?>
                  <tbody>
                   @foreach ($coupon as $item)
                   <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->value}}</td>
                    <td>
                     <a href="/admin/coupon-delete/{{$item->id}}"> <button type="button" class="btn btn-danger">Delete</button></a>
                     <a href="/admin/coupon-edit/{{$item->id}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                     @if($item->status==1)
                     <a href="/admin/coupon/status/0/{{$item->id}}"> <button type="button" class="btn btn-danger">Active</button></a>
                     @elseif($item->ststus==0)
                     <a href="/admin/coupon/status/1/{{$item->id}}"> <button type="button" class="btn btn-danger">Deactive</button></a>
                     @endif
                    </td>
                  </tr>
              
                   @endforeach
                   
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
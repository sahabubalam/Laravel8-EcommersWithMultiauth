@extends('layouts.admin')
@section('page_title','Category')
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

            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a class="btn btn-primary" href="/admin/add-category">Add Category</a>
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
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($category as $item)
                    <tr>
                      <td>{{$item->category_name}}</td>
                      <td>{{$item->category_slug}}</td>
                      <td>
                       <a href="/admin/category-delete/{{$item->id}}"> <button type="button" class="btn btn-danger">Delete</button></a>
                       <a href="/admin/category-edit/{{$item->id}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                       @if($item->status==1)
                       <a href="/admin/category/status/0/{{$item->id}}"> <button type="button" class="btn btn-success">Active</button></a>
                       @elseif($item->status==0)
                       <a href="/admin/category/status/1/{{$item->id}}"> <button type="button" class="btn btn-warning">Deactive</button></a>
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
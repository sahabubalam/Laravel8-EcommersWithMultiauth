
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
                <a class="btn btn-primary" href="/admin/add-file"> Add Multiple Image</a>
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
                    <th>S.I</th>
                    <th>Category Name</th>
                  
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      @php
                         $sum=1; 
                      @endphp
                    @foreach ($data as $image)
                    <tr>
                        <td>{{$sum++}}</td>
                      <td><?php foreach(json_decode($image->filenames)as $picture){  ?>
                        <img src="{{asset('/files/'.$picture)}}" style="height:50px;width:40px">
                        <?php } ?>
                    
                    </td>
                      <td>
                       <a href="/admin/file-edit/{{base64_encode($image->id)}}"> <button type="button" class="btn btn-primary">Edit</button></a>
                       <a href="/admin/file-delete/{{base64_encode($image->id)}}"> <button type="button" class="btn btn-danger">delete</button></a>
                      
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
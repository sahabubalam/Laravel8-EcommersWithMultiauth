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
                <h3 class="card-title">Add Multiple Image</h3>
              </div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 

<br>
<div class="container">
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Sorry!</strong> Here have some issue please check<br><br>
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
</div>
@endif
  
@if(session('message'))
<div class="alert alert-success">
  {{ session('message') }}
</div> 
@endif

  
 
<form method="post" action="{{route('file.update')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="input-group realprocode control-group lst increment" >
      <input type="file" name="filenames[]" class="myfrm form-control">
      <?php foreach(json_decode($data->filenames)as $picture){  ?>
      <img src="{{asset('/files/'.$picture)}}" style="height:50px;width:40px">
      <?php } ?>
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
  
    <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
  
</form>        
</div>
  
<script type="text/javascript">
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
</div>

</div>

<div class="col-md-6">

</div>

</div>

</div>
</section>

</div>
@endsection

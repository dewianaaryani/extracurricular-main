@extends('Admin.layout.app')
@section('title','Update UPD')
@section('breadcrumb')
      <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
      <div class="breadcrumb-item"><a href="{{route('updprod.index')}}">UPD PROD</a></div>
    <div class="breadcrumb-item">Update UPD PROD</div>
@endsection
@section('content')
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

<div class="row">
  <div class="col-12">
<form method="post" action="{{route('updprod.update', $updprod->id)}}" enctype="multipart/form-data" >
@csrf
@method('PUT')
<div class="card card-primary">      
      <div class="card-header"><h4>Add Data</h4></div>
      <div class="card-body">
          <div class="row">
            <div class="form-group col-12">
              <label for="name">Name</label>
              <input id="name" type="text" class="form-control" name="name" value="{{$updprod -> name}}" autofocus>
            </div>
          </div>      
          <div class="row">
            <div class="form-group col-12">
                <label class="">Description</label>
                <div class="col-12">
                  <textarea class="summernote-simple form-control" name="description">{{$updprod -> description}}</textarea>                  
                </div>
            </div>
          </div>    
          <div class="row">
            <div class="form-group col-4">
              <label for="tempat">Tempat</label>
              <input id="tempat" type="text" class="form-control" name="tempat" value="{{$updprod -> tempat}}">
            </div>
            <div class="form-group col-4">
              <label for="hari">Hari</label>
              <input id="hari" type="text" class="form-control" name="hari" value="{{$updprod -> hari}}">
            </div>
            <div class="form-group col-4">
              <label for="jam">Jam</label>
              <input id="jam" type="text" class="form-control" name="jam" value="{{$updprod -> jam}}">
            </div>
          </div>          
          <div class="form-group">
            <div class="row">
                <div class="col-4">
                  <label>Image 1</label>
                  <input type="file" class="form-control" name="image_1">
                </div>
                <div class="col-4">
                  <label>Image 2</label>
                  <input type="file" class="form-control" name="image_2">      
                </div>
                <div class="col-4">
                  <label>Image 3</label>
                  <input type="file" class="form-control" name="image_3">      
                </div>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Add
            </button>
          </div>
      </div>
    </div>
</form>

</div></div>
@endsection
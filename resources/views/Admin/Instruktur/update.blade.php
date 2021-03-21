@extends('Admin.layout.app')
@section('title','Update Instruktur UPD')
@section('breadcrumb')
      <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
      <div class="breadcrumb-item"><a href="{{route('instruktur.index')}}">Instruktur UPD</a></div>
    <div class="breadcrumb-item">Update Instruktur UPD</div>
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
<form method="post" action="{{route('instruktur.update', $instruktur->id)}}" enctype="multipart/form-data" >
@csrf
@method('PUT')
<div class="card card-primary">      
      <div class="card-header"><h4>Add Data</h4></div>
      <div class="card-body">
          <div class="row">
            <div class="form-group col-8">
              <label for="name">Name</label>
              <input id="name" type="text" class="form-control" name="name" value="{{$instruktur -> name}}" autofocus>
            </div>
            <div class="form-group col-4">
              <label for="nip">NIP</label>
              <input id="nomor_induk" type="text" class="form-control" name="nomor_induk" value="{{$instruktur -> nomor_induk}}">
            </div>
          </div>      
          <div class="row">
            <div class="form-group col-6">
              <label for="username">Username</label>
              <input id="username" type="username" class="form-control" name="username" value="{{$instruktur -> username}}">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password" class="d-block">Password</label>
              <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="{{$instruktur -> password}}">                      
            </div>                    
          </div>
          <div class="row">
            <div class="form-group col-12">
              <label>upd</label>
              <select class="form-control selectric" name="upd_id">
              <option>Open this select menu</option>
              @foreach ($upd as $upd)
              <option value="{{ $upd->id }}" {{$upd->id == $instruktur->upd_id ? 'selected="selected"' : ''}}>{{ $upd->name }}</option>
      @endforeach      
              </select>
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
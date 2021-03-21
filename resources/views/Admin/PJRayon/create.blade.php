@extends('admin.layout.app')
@section('title','Pembimbing Rayon')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item active"><a href="{{route('pjr.index')}}">Pembimbing Rayon</a></div>              
              <div class="breadcrumb-item">Add Pembimbing Rayon</div>
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
<form method="post" action="{{route('pjr.store')}}" enctype="multipart/form-data" class="">
@csrf
    <div class="card card-primary">      
      <div class="card-header"><h4>Add Data</h4></div>
      <div class="card-body">
          <div class="row">
            <div class="form-group col-8">
              <label for="name">Name</label>
              <input id="name" type="text" class="form-control" name="name" autofocus>
            </div>
            <div class="form-group col-4">
              <label for="nip">NIP</label>
              <input id="nomor_induk" type="text" class="form-control" name="nomor_induk">
            </div>
          </div>      
          <div class="row">
            <div class="form-group col-6">
              <label for="username">Username</label>
              <input id="username" type="username" class="form-control" name="username">
              <div class="invalid-feedback">
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password" class="d-block">Password</label>
              <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">                      
            </div>                    
          </div>
          <div class="row">
            <div class="form-group col-12">
              <label>Rayon</label>
              <select class="form-control selectric" name="rayon_id">
              <option>Open this select menu</option>
              @foreach ($rayon as $rayon)
                      <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
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
</div>
</div>        
@endsection
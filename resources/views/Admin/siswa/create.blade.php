@extends('admin.layout.app')
@section('title','Siswa')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item active"><a href="{{route('siswa.index')}}">Siswa</a></div>              
              <div class="breadcrumb-item">Add Siswa</div>
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
<form method="post" action="{{route('siswa.store')}}" enctype="multipart/form-data" class="">
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
              <label for="nip">NIS</label>
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
            <div class="form-group col-6">
              <label>Rayon</label>
              <select class="form-control selectric" name="rayon_id">
              <option>Open this select menu</option>
              @foreach ($rayon as $rayon)
                      <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
              @endforeach    
              </select>
            </div>                    
            <div class="form-group col-6">
              <label>Rombel</label>
              <select class="form-control selectric" name="rombel_id">
              <option>Open this select menu</option>
              @foreach ($rombel as $rombel)
                      <option value="{{ $rombel->id }}">{{ $rombel->name }}</option>
              @endforeach    
              </select>
            </div>     
          </div>                  
          <div class="row">
            <div class="form-group col-4">
              <label>UPD</label>
              <select class="form-control selectric" name="upd_id">
              <option>Open this select menu</option>
              @foreach ($upd as $upd)
                      <option value="{{ $upd->id }}">{{ $upd->name }}</option>
              @endforeach    
              </select>
            </div>                    
            <div class="form-group col-4">
              <label>UPD PROD</label>
              <select class="form-control selectric" name="updprod_id">
              <option>Open this select menu</option>
              @foreach ($updprod as $updprod)
                      <option value="{{ $updprod->id }}">{{ $updprod->name }}</option>
              @endforeach    
              </select>
            </div>     
            <div class="form-group col-4">
              <label>Senbud</label>
              <select class="form-control selectric" name="senbud_id">
              <option>Open this select menu</option>
              @foreach ($senbud as $senbud)
                      <option value="{{ $senbud->id }}">{{ $senbud->name }}</option>
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
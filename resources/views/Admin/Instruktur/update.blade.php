@extends('Admin.layout')

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
<form method="post" action="{{route('gurusenbud.update', $gurusenbud->id)}}" enctype="multipart/form-data" class="form-control">
@csrf
@method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$gurusenbud->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">NIS</label>
    <input type="text" class="form-control" name="nomor_induk" value="{{$gurusenbud->nomor_induk}}">
  </div>
  <div class="mb-3">
    <label class="form-label">SenBud</label>
    <select class="form-select" aria-label="Default select example" name="senbud_id">
      @foreach ($senbud as $senbud)
              <option value="{{ $senbud->id }}">{{ $senbud->name }}</option>
      @endforeach        
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="{{$gurusenbud->username}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$gurusenbud->password}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
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
<form method="post" action="{{route('instruktur.update', $instruktur->id)}}" enctype="multipart/form-data" class="form-control">
@csrf
@method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$instruktur->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">NIS</label>
    <input type="text" class="form-control" name="nomor_induk" value="{{$instruktur->nomor_induk}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Upd</label>
    <select class="form-select" aria-label="Default select example" name="upd_id">
      @foreach ($upd as $upd)
              <option value="{{ $upd->id }}" {{$upd->id == $instruktur->upd_id ? 'selected="selected"' : ''}}>{{ $upd->name }}</option>
      @endforeach        
    </select>
  </div>  
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="{{$instruktur->username}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$instruktur->password}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
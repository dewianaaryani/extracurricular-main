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
<form method="post" action="{{route('instrukturprod.update', $instrukturprod->id)}}" enctype="multipart/form-data" class="form-control">
@csrf
@method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$instrukturprod->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Nip</label>
    <input type="text" class="form-control" name="nomor_induk" value="{{$instrukturprod->nomor_induk}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="{{$instrukturprod->username}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Upd Prod</label>
    <select class="form-select" aria-label="Default select example" name="updprod_id">
      @foreach ($updprod as $updprod)
              <option value="{{ $updprod->id }}" {{$updprod->id == $instrukturprod->updprod_id ? 'selected="selected"' : ''}}>{{ $updprod->name }}</option>
      @endforeach        
    </select>
  </div>  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{$instrukturprod->password}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
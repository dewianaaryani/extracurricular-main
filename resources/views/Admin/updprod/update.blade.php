@extends('Admin.layout')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('updprod.update', $updprod->id)}}" class="form-control">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$updprod->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Desc</label>
    <input type="text" class="form-control" name="description" value="{{$updprod->description}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Tempat</label>
    <input type="text" class="form-control" name="tempat" value="{{$updprod->tempat}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Hari</label>
    <input type="text" class="form-control" name="hari" value="{{$updprod->hari}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Jam</label>
    <input type="text" class="form-control" name="jam" value="{{$updprod->jam}}">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile" name="image_1">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile" name="image_2">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" type="file" id="formFile" name="image_3">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
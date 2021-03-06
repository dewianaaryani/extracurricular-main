@extends('Admin.layout')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('senbud.update', $senbud->id)}}" class="form-control">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$senbud->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Desc</label>
    <input type="text" class="form-control" name="description" value="{{$senbud->description}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Tempat</label>
    <input type="text" class="form-control" name="tempat" value="{{$senbud->tempat}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Hari</label>
    <input type="text" class="form-control" name="hari" value="{{$senbud->hari}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Jam</label>
    <input type="text" class="form-control" name="jam" value="{{$senbud->jam}}">
  </div>
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
@extends('Admin.layout')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('upd.update', $upd->id)}}" class="form-control">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$upd->name}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Tempat</label>
    <input type="text" class="form-control" name="tempat" value="{{$upd->tempat}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Hari</label>
    <input type="text" class="form-control" name="hari" value="{{$upd->hari}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Jam</label>
    <input type="text" class="form-control" name="jam" value="{{$upd->jam}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
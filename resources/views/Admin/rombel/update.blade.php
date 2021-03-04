@extends('Admin.layout')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('rombel.update', $rombel->id)}}" class="form-control">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{$rombel->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
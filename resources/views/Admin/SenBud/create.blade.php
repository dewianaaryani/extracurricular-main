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
<form method="post" action="{{route ('senbud.store')}}" enctype="multipart/form-data" class="form-control">
@csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">tempat</label>
    <input type="text" class="form-control" name="tempat">
  </div>
  <div class="mb-3">
    <label class="form-label">desc</label>
    <input type="text" class="form-control" name="description">
  </div>
  <div class="mb-3">
    <label class="form-label">Hari</label>
    <input type="text" class="form-control" name="hari">
  </div>
  <div class="mb-3">
    <label class="form-label">Jam</label>
    <input type="text" class="form-control" name="jam">
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
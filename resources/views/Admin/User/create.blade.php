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
<form method="post" action="{{route('user.store')}}" enctype="multipart/form-data" class="form-control">
@csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Role</label>
    <select class="form-select" aria-label="Default select example" name="role">
        <option selected>Open this select menu</option>
        <option value="Koordinator Senbud & UPD">Koordinator Senbud & UPD</option>
        <option value="Siswa">Siswa</option>
        <option value="Instruktur UPD">Instructure UPD</option>
        <option value="Instruktur UPD Produktif">Instructure UPD Produktif</option>
        <option value="Guru Senbud">Guru Senbud</option>
        <option value="Pembimbing Rayon">Pembimbing Rayon</option> 
    </select>
  </div>
  <div class="mb-3">
  <label class="form-label">Rombel</label>
  <select class="form-select" aria-label="Default select example" name="rombel">
      <option selected>Open this select menu</option>
      @foreach ($rombel as $rombel)
              <option value="{{ $rombel->id }}">{{ $rombel->name }}</option>
      @endforeach        
    </select>
  </div>
  <div class="mb-3">
  <label class="form-label">Rayon</label>
  <select class="form-select" aria-label="Default select example" name="rayon">
    <option selected>Open this select menu</option>
      @foreach ($rayon as $rayon)
              <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
      @endforeach        
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Upd</label>
    <input type="text" class="form-control" name="upd_id">
  </div>
  <div class="mb-3">
    <label class="form-label">SenBud</label>
    <input type="text" class="form-control" name="senbud_id">
  </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
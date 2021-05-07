@extends('admin.layout.app')
@section('title','Instruktur UPD')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item active"><a href="{{route('absen.index')}}">Absen</a></div>              
              <div class="breadcrumb-item">Add Absen</div>
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
<form method="post" action="{{route('absen.store')}}" enctype="multipart/form-data" class="">
@csrf
    <div class="card card-primary">      
      <div class="card-header"><h4>Add Data</h4></div>
      <div class="card-body">
          <div class="row">
            <div class="form-group col-4">
              <label for="name">Date</label>
              <input id="date" type="date" class="form-control" name="date" autofocus>
            </div>              
          <div class="form-group col-12">
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
@extends('admin.layout.app')
@section('title','Nilai')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item ">Nilai</div>              
              <div class="breadcrumb-item">Add Nilai {{$type}}</div>
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
    @if($type == "Harian")
        <form method="post" action="{{route('daily.store')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="card card-primary">      
            <div class="card-header"><h4>Add Data</h4>
                <div class="card-header-action">
                    <a class="btn btn-success" href="{{route('daily.index')}}">Back</a>  
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autofocus class="form-control"> 
                    </div>              
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Add
                    </button>
                </div>
            </div>
            </div>
        </form>
    @elseif($type == "PTS")
        <form method="post" action="{{route('pts.store')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="card card-primary">      
            <div class="card-header"><h4>Add Data</h4>
                <div class="card-header-action">
                    <a class="btn btn-success" href="{{route('pts.index')}}">Back</a>  
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autofocus class="form-control"> 
                    </div>              
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Add
                    </button>
                </div>
            </div>
            </div>
        </form>
    @elseif($type == "PAS")
        <form method="post" action="{{route('pas.store')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="card card-primary">      
            <div class="card-header"><h4>Add Data</h4>
                <div class="card-header-action">
                    <a class="btn btn-success" href="{{route('pas.index')}}">Back</a>  
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autofocus class="form-control"> 
                    </div>              
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Add
                    </button>
                </div>
            </div>
            </div>
        </form>
    @elseif($type == "UKK")
        <form method="post" action="{{route('ukk.store')}}" enctype="multipart/form-data" class="">
            @csrf
            <div class="card card-primary">      
            <div class="card-header"><h4>Add Data</h4>
                <div class="card-header-action">
                    <a class="btn btn-success" href="{{route('ukk.index')}}">Back</a>  
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autofocus class="form-control"> 
                    </div>              
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Add
                    </button>
                </div>
            </div>
            </div>
        </form>
    @else
        <h1>Maaf type nilai tidak dikenali</h1>
    @endif 
  

</div>
</div>        
@endsection
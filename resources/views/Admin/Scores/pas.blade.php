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

   

     <form method="post" action="{{route('pas.update', $score->id)}}" enctype="multipart/form-data" class="">
            @csrf
            @method('PUT')
            <div class="card card-primary">      
                <div class="card-header"><h4>Nilai {{$type}}</h4>
                    <div class="card-header-action">
                        <a class="btn btn-success" href="{{route('pas.show',$score->score_id)}}">Back</a>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Nilai *</label>
                            <input type="text" name="score" id="name" autofocus class="form-control" value="{{$score->score}}"> 
                        </div>       
                    </div>       
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Catatan (Optional)</label>
                            <input type="text" name="note" placeholder="Bagus, Harus ditingkatkan lagi" id="name" class="form-control " value="{{$score->note}}"> 
                        </div>
                    </div>      
                </div>        
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Add
                    </button>
                </div>
            
            </div>
        </form>

  

</div>
</div>        
@endsection
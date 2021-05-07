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
    <form action="" method="post">
        @csrf
        @method('PUT')
        
    </form>
</div>        
@endsection
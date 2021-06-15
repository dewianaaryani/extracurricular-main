@extends('admin.layout.app')

@section('title','Absen')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('absenSiswa/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item">Absen</div>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="row">            
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Daftar Absensi</h4>
                    <div class="card-header-action">
                        <!-- <a class="btn btn-success" href="{{route('absen.create')}}">Add</a>   -->
                    </div>
            
                    </div>
                    <div class="card-body p-10">
                        <div class="row">
                            @foreach($absenUser as $a)
                                <div class="col-4 mb-4">
                                    <div class="hero bg-primary text-white">
                                    <div class="hero-inner">
                                        <h4 class="text-center">{{strtoupper($a->ekskul_name)}}</h4>                                    
                                        <p class="text-left">Jadwal Absen : <br>{{$a->tgl_jadwal}}</p>     
                                        <center>
                                        <a class="btn btn-warning" href="{{route('absenSiswa.show', $a->id)}}">View</a>  
                                        </center>
                                    </div>
                                    </div>                                    
                                </div>                            
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        
                            
                            
                            {!! $absenUser->links() !!}
                            
                            
                        
                    </div>
                </div>
                </div>
            </div>
            
@endsection

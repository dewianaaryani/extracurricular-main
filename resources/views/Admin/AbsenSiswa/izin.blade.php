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
                    <h4>Absen Siswa</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{route('absenSiswa.index')}}">Back</a>  
                    </div>            
                    </div>
                    <div class="card-body p-10">
                    <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                <div class="col-lg-12">                                                                     
                                    <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <form action="{{route('absenSiswa.postIzin', $absen->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name" >Alasan Izin : </label>
                                                    <input  type="text" class="form-control" name="reason" autofocus>                      
                                                </div>       
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </center>
                                    </div>
                                    </div>                            
                                </div>
                            </div>
                    </div>                    
                </div>
                </div>
            </div>
            
@endsection

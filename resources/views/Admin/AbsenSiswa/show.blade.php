@extends('admin.layout.app')

@section('title','Absen')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('absenSiswa/')}}">Dashboard</a></div>              
                <div class="breadcrumb-item">Absen</div>
@endsection
@section('content')
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
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                    <div class="invoice-title">
                                    <h2>{{$absenUser->ekskul_name}}</h2>
                                    <div class="invoice-number">Tanggal {{$absenUser->tgl_jadwal}}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                        <h5><strong>Keterangan Absen : </strong></h5>
                                            @if($absenUser->status_absen == '0')
                                                <h5>Belum Absen</h5>                                            
                                                <a href="{{route('absenSiswa.present', $absenUser->id)}}" class="btn btn-danger">Hadir</a> 
                                                <a href="{{route('absenSiswa.izin', $absenUser->id)}}" class="btn btn-danger">Izin</a> 
                                            @elseif($absenUser->status_absen == '1')
                                                <h5>Sudah Absen (Belum Diapprove)</h5>
                                                <p>Absen Pada Tanggal : {{$absenUser->tgl_update}}</p>
                                            @elseif($absenUser->status_absen == '2')
                                                <h5>Izin (Belum Diapprove)</h5>
                                                <p>Izin Pada Tanggal : {{$absenUser->tgl_update}}</p>
                                            @elseif($absenUser->status_absen == '3')
                                                <h5>Sudah Absen & Di Approve</h5>                                                
                                                <p>Di approve pada tanggal : {{$absenUser->tgl_update}}</p>
                                            @elseif($absenUser->status_absen == '4')
                                                <h5>Tidak di Approve</h5>
                                                <p>Tidak diapprove pada tanggal : {{$absenUser->tgl_update}}</p>
                                            @elseif($absenUser->status_absen == '5')
                                                <h5>Sudah Izin & Di Approve</h5>
                                                <p>Di approve pada tanggal : {{$absenUser->tgl_update}}</p>
                                                <p>Alasan Izin : {{$absenUser->alasan}}</p>
                                            @endif                                                                                                                                                       
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

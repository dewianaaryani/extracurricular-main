@extends('admin.layout.app')

@section('title','Dashboard')

@section('content')
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Jumlah Siswa Rayon</h4>
                  </div>
                  <div class="card-body">
                    {{$countStudent}} 
                    <a href="#" class="stretched-link"></a>                   
                  </div>
                </div>
              </div>
            </div>            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Siswa Belum Absen</h4>
                  </div>
                  <div class="card-body">
                    {{$countAbsen}}
                    <a href="#" class="stretched-link"></a>                   
                  </div>
                </div>
              </div>
            </div>            
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Izin belum Terapprove</h4>
                  </div>
                  <div class="card-body">
                    {{$countIzin}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Tidak Terapprove  </h4>
                  </div>
                  <div class="card-body">
                    {{$countNoApprove}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">            
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Daftar Siswa Rayon Belum Absen</h4>
                    <div class="card-header-action">
                        
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="myTable">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Nis</th>
                                <th>Rombel</th>
                                <th>Ekskul</th>
                                <th>Instruktur</th>
                                <th>Date</th>
                            </tr>
                          </thead> 
                          <tbody>
                            @foreach($absen as $a)
                              <tr>
                                <td>{{ ++$i}}</td>
                                <td>{{ $a -> student_name}}</td>
                                <td>{{ $a -> nis}}</td>
                                <td>{{ $a -> student_rombel}}</td>
                                <td>{{ $a -> type_ekskul}} {{ $a -> ekskul_name}}</td>
                                <td>{{ $a -> instruktur_name}}</td>
                                <td>{{ date('d-m-Y', strtotime($a->dates))}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                    {!! $absen->links() !!}
                    </div>
                </div>
                </div>
            </div>
@endsection
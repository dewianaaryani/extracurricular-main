@extends('admin.layout.app')
@section('title','Pembimbing Rayon')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
              <div class="breadcrumb-item">Pembimbing Rayon</div>
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
                    <h4>Daftar Absen {{$ekskul}} Rayon </h4>
                    <div class="card-header-action">
                    <form>
                        <div class="input-group">                            
                          <input type="search" class="form-control" placeholder="Search" id="searchBar">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                            <a class="btn btn-success" href="{{route('absen.index')}}">Back</a>  
                            
                        </div>
                      </form>
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>Name</th>
                                <th>Rombel</th>
                                <th>UPD</th>
                                <th>Instruktur</th>
                                <th>Status</th>                                                        
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absen as $a)    
                            <tr>
                                <td>{{ ++ $i }}</td>
                                <td>{{ $a -> nis}}</td>
                                <td>{{ $a -> student_name}}</td>
                                <td>{{ $a -> student_rombel}}</td>
                                <td>{{ $a -> ekskul_name}}</td>
                                <td>{{ $a -> instruktur_name}}</td>
                                
                                <td>
                                    <center>
                                        @if($a->absen_status == '0')                                
                                            <span class="badge badge-danger">Belum Absen</span>
                                        @elseif($a->absen_status == '1')                                
                                            <span class="badge badge-primary">Sudah Absen</span>                                    
                                        @elseif($a->absen_status == '2')                                
                                            <span class="badge badge-warning">Izin</span>                                    
                                        @elseif($a->absen_status == '3')                                
                                            <span class="badge badge-success">Terapprove</span>                                    
                                        @elseif($a->absen_status == '4')                                
                                            <span class="badge badge-danger">Tidak Di approve</span>                                    
                                        @elseif($a->absen_status == '5')                                
                                            <span class="badge badge-success">Success</span>                                    
                                        @endif
                                    </center>
                                </td>                 
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

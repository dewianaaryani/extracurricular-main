@extends('admin.layout.app')
@section('title','Siswa')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
              <div class="breadcrumb-item">Siswa</div>
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
                    <h4>Daftar Siswa</h4>
                    <div class="card-header-action">
                        <a class="btn btn-success" href="{{route('siswa.create')}}">Add</a>  
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>NIS</th>
                            <th>Rombel</th>
                            <th>Rayon</th>
                            <th>Senbud</th>
                            <th>UPD</th>
                            <th>UPD PROD</th>
                            <th>Username</th>                            
                            <th>Action</th>
                        </tr>
                        @foreach($siswa as $siswa)    
                        <tr>
                            <td>{{ ++ $i }}</td>
                            <td>{{ $siswa -> name}}</td>
                            <td>{{ $siswa -> nomor_induk}}</td>
                            <td>{{ $siswa -> rombel_name}}</td>
                            <td>{{ $siswa -> rayon_name}}</td>
                            <td>{{ $siswa -> senbud_name}}</td>
                            <td>{{ $siswa -> upd_name}}</td>
                            <td>{{ $siswa -> updprod_name}}</td>
                            <td>{{ $siswa -> username}}</td>                            
                            <td>
                                <form action="{{route('siswa.destroy', $siswa->id)}}" method="post">
                                    <a href="{{route('siswa.edit', $siswa->id)}}" type="button" class="btn btn-primary">Update</a>
                                    
                                    @csrf
                                    @method('DELETE')               
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>   
                        @endforeach                     
                        </table>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                </div>
            </div>



@endsection

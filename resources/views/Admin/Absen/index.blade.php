@extends('admin.layout.app')

@section('title','Absen')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
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
                        <a class="btn btn-success" href="{{route('absen.create')}}">Add</a>  
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Eskul</th>
                            <th>Pembimbing</th>                                                        
                            <th>Action</th>
                        
                        </tr>
                        @foreach($absenUser as $a)
                            <tr>
                                <td> {{ ++ $i }} </td>
                                <td> {{ $a -> date }} </td>
                                <td> {{ $a -> ekskul_name }} </td>
                                <td> {{ $a -> user_name }} </td>
                                <td>
                                    <form action="{{route('absen.destroy', $a->id)}}" method="post">
                                        <a href="{{route('absen.edit', $a->id)}}" type="button" class="btn btn-primary">Update</a>                                        
                                        <a href="{{route('absen.show', $a->id)}}" type="button" class="btn btn-primary">Show</a>                                        
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
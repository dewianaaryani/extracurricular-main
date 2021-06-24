@extends('admin.layout.app')
@section('title','Nilai')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
              <div class="breadcrumb-item">Nilai</div>
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
                    <h4>Daftar Nilai {{$type}}</h4>
                    <div class="card-header-action">
                        <a class="btn btn-success" href="{{route('daily.create')}}">Add</a>  
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md myTable">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Tanggal</th>                            
                            <th>Action</th>
                        </tr>
                        @foreach($score as $a)    
                        <tr>
                            <td>{{ ++ $i }}</td>
                            <td>Nilai Harian {{ $a -> scorename}}</td>
                            <td>{{ $a -> created_at}}</td>                   
                            <td>
                                <form action="{{route('daily.destroy', $a->id)}}" method="post"> 
                                    <a href="" class="btn btn-warning">View</a>                                                                       
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
                    {!! $score->links() !!}
                    </div>
                </div>
                </div>
            </div>



@endsection

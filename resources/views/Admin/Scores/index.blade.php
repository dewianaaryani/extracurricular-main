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
                    <h4>Daftar Nilai {{$types}}</h4>
                    <div class="card-header-action">
                    @if($types == "Harian")
                        <a class="btn btn-success" href="{{route('daily.create')}}">Add</a>  
                    @elseif($types == "PTS")
                        <a class="btn btn-success" href="{{route('pts.create')}}">Add</a>  
                    @elseif($types == "PAS")
                        <a class="btn btn-success" href="{{route('pas.create')}}">Add</a>  
                    @elseif($types == "UKK")
                        <a class="btn btn-success" href="{{route('ukk.create')}}">Add</a>  
                    @endif 
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
                            <td>Nilai {{$types}} {{ $a -> scorename}}</td>
                            <td>{{ $a -> created_at}}</td>                   
                            <td>
                                @if($types == "Harian")
                                    <form action="{{route('daily.destroy', $a->id)}}" method="post"> 
                                        <a href="{{route('daily.show', $a->id)}}" class="btn btn-warning">View</a>                                                                       
                                        @csrf
                                        @method('DELETE')               
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @elseif($types == "PTS")
                                    <form action="{{route('pts.destroy', $a->id)}}" method="post"> 
                                        <a href="{{route('pts.show', $a->id)}}" class="btn btn-warning">View</a>                                                                       
                                        @csrf
                                        @method('DELETE')               
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @elseif($types == "PAS")
                                    <form action="{{route('pas.destroy', $a->id)}}" method="post"> 
                                        <a href="{{route('pas.show', $a->id)}}" class="btn btn-warning">View</a>                                                                       
                                        @csrf
                                        @method('DELETE')               
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @elseif($types == "UKK")
                                    <form action="{{route('ukk.destroy', $a->id)}}" method="post"> 
                                        <a href="{{route('ukk.show', $a->id)}}" class="btn btn-warning">View</a>                                                                       
                                        @csrf
                                        @method('DELETE')               
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif 
                                
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

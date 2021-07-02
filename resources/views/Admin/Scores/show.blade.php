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
                    
                    
                    @if($types == "daily")
                        <h4>Daftar Nilai Harian Tanggal  Materi </h4>
                        <div class="card-header-action">
                            <a class="btn btn-success" href="{{route('daily.index')}}">Back</a>  
                        </div>
                    @elseif($types == "pts")
                        <h4>Daftar Nilai PTS</h4>
                        <div class="card-header-action">    
                            <a class="btn btn-success" href="{{route('pts.index')}}">Back</a>  
                        </div>
                    @elseif($types == "pas")
                        <h4>Daftar Nilai PAS</h4>
                        <div class="card-header-action">
                            <a class="btn btn-success" href="{{route('pas.index')}}">Back</a>  
                        </div>
                    @elseif($types == "ukk")
                        <h4>Daftar Nilai UKK</h4>
                        <div class="card-header-action">
                            <a class="btn btn-success" href="{{route('ukk.index')}}">Back</a>  
                        </div>
                    @endif 
                    </div>
            
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md myTable">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Rombel</th>            
                            <th>Rayon</th>                            
                            <th>Nilai</th>                            
                            <th>Action</th>
                        </tr>
                        @foreach($score as $a)    
                        <tr>
                            <td>{{ ++ $i }}</td>
                            <td>{{ $a -> username}}</td>                            
                            <td>{{ $a -> rombel}}</td>
                            <td>{{ $a -> rayon}}</td>                            
                            <td>
                                @if($a->score == NULL)
                                    <a class="badge badge-danger" href="#">Kosong</a>
                                @else
                                    {{ $a -> score}}
                                @endif
                            </td>
                            <td>
                                @if($types == "daily")
                                    <a href="{{route( 'daily.edit', $a->id)}}" class="btn btn-warning">View</a>
                                @elseif($types == "pts")
                                    <a href="{{route( 'pts.edit', $a->id)}}" class="btn btn-warning">View</a>
                                @elseif($types == "pas")
                                    <a href="{{route( 'pas.edit', $a->id)}}" class="btn btn-warning">View</a>
                                @elseif($types == "ukk")
                                    <a href="{{route( 'ukk.edit', $a->id)}}" class="btn btn-warning">View</a>
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

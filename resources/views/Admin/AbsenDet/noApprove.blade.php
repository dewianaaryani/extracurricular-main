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
    <!-- @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
    <div class="row">            
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Alasan Tidak Terapprove</h4>
                    <div class="card-header-action">
                        <a class="btn btn-success" href="{{route('absen.index')}}">Back</a>  
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <form action="{{route('absenDet.postNoApprove', $absenDetail->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">                            
                                <input type="text" name="reason" id="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>    
                        </table>
                    </div>
                </div>
                                                                                           
                              
                
                
            </div>
        </div>
    </div>
    
@endsection
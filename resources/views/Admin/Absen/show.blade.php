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
                    <h4>Daftar Absensi</h4>
                    <div class="card-header-action">

                    <form class="card-body" action="/search" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..." name="q">
                            <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                        </div>
                    </form>

                        <a class="btn btn-success" href="{{route('absen.index')}}">Back</a>  
                    </div>
            
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>#</th>
                                <th>id</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Pembimbing</th>
                                
                                
                                <th>Action</th>
                            
                            </tr>
                            @foreach($absenDet as $a)
                                <tr>
                                    <td> {{ ++ $i }} </td>
                                    <td>{{$a->id}}</td>
                                    <td> {{ $a->student_name }} </td>   
                                    @if($a->status == '0')
                                        <td>Belum Absen</td>                             
                                    @elseif($a->status == '1')
                                        <td>Sudah Absen</td>      
                                    @elseif($a->status == '2')
                                        <td>Izin</td>                             
                                    @elseif($a->status == '3')
                                        <td>Sudah Approve</td>          
                                    @elseif($a->status == '4')
                                        <td>Tidak di Approve Pembina</td>     
                                    @elseif($a->status == '5')
                                        <td>Izin di Approve</td>          
                                    @endif
                                    <td> {{ $a->student_name }} </td>   
                                    <td>                
                                                                                                    
                                        <?php if ($a->status == '1' ){ ?>
                                            <form action="{{route('absenDet.approveAbsen',$a) }}" method="get">                                                                                    
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        <?php   }
                                        else if ($a->status == '2' ){ ?> 
                                            <form action="{{route('absenDet.approveIzin',$a) }}" method="get" style="width: 20px;">                                                                                    
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        <?php   }
                                        else if ($a->status == '4' ){ ?> 
                                            <form action="{{route('absenDet.approveAbsen',$a) }}" method="get">                                                                                    
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        <?php   }
                                        else{ ?>
                                        <form action="">
                                            <button type="submit" class="btn btn-primary" disabled>
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        <?php   }
                                        ?>     

                                        <?php if ($a->status == '2' ){ ?>
                                        <form action="" method="get">
                                            <a href="{{route('absenDet.noApprove', $a->id)}}"  class="btn btn-danger"><i class="fa fa-times"></i></a>                                                                            
                                        </form>
                                        <?php   }
                                        else if ($a->status == '3' ){ ?> 
                                        <form action="" method="get">
                                            <a href="{{route('absenDet.noApprove', $a->id)}}"  class="btn btn-danger"><i class="fa fa-times"></i></a>                                                                            
                                        </form>
                                        <?php   }
                                        else if ($a->status == '0' ){ ?> 
                                            <form action="" method="get">
                                                <a href="{{route('absenDet.noApprove', $a->id)}}"  class="btn btn-danger"><i class="fa fa-times"></i></a>                                                                            
                                            </form>
                                            <?php   }
                                        else if ($a->status == '5' ){ ?> 
                                        <form action="" method="get">
                                            <a href="{{route('absenDet.noApprove', $a->id)}}"  class="btn btn-danger"><i class="fa fa-times"></i></a>                                                                            
                                        </form>
                                        <?php   }                                                                                                            
                                        ?>                                                                                          
                                        <!-- <a href="{{route('absen.edit', $a->id)}}" type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>                                         -->                                    
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
    <div class="modal fade"  role="dialog" id="exampleModal{{$a->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
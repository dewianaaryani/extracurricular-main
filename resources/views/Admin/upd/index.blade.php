@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{ route('upd.create') }}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">tempat</th>
            <th scope="col">hari</th>
            <th scope="col">jam</th>
            <th scope="col">image</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($upd as $upd)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $upd -> name}}</td>
                    <td>{{ $upd -> tempat}}</td>                
                    <td>{{ $upd -> hari}}</td>
                    <td>{{ $upd -> jam}}</td>
                    <td>
                        <img src="{{asset('images/upd/'.$upd->image_1)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/upd/'.$upd->image_2)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/upd/'.$upd->image_3)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                    </td>

                    <td>
                    <form action="{{route('upd.destroy', $upd->id)}}" method="post">
                        <a href="{{route('upd.edit',$upd->id)}}" type="button" class="btn btn-primary">Update</a>
                        
                        @csrf
                        @method('DELETE')               
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>

                </tr>        
            @endforeach
        </tbody>
    </table>
</div>

@endsection
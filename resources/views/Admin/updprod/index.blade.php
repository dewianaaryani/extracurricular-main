@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{ route('updprod.create') }}">Add</a>
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
            @foreach($updprod as $updprod)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $updprod -> name}}</td>
                    <td>{{ $updprod -> tempat}}</td>                
                    <td>{{ $updprod -> hari}}</td>
                    <td>{{ $updprod -> jam}}</td>
                    <td>
                        <img src="{{asset('images/updprod/'.$updprod->image_1)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/updprod/'.$updprod->image_2)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/updprod/'.$updprod->image_3)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                    </td>
                    <td>
                    <form action="{{route('updprod.destroy', $updprod->id)}}" method="post">
                        <a href="{{route('updprod.edit',$updprod->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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
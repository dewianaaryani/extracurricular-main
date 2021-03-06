@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{ route('senbud.create') }}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">tempat</th>
            <th scope="col">hari</th>
            <th scope="col">jam</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senbud as $senbud)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $senbud -> name}}</td>
                    <td>{{ $senbud -> tempat}}</td>                
                    <td>{{ $senbud -> hari}}</td>
                    <td>{{ $senbud -> jam}}</td>
                    <td>
                        <img src="{{asset('images/senbud/'.$senbud->image_1)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/senbud/'.$senbud->image_2)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                        <img src="{{asset('images/senbud/'.$senbud->image_3)}}" alt="" class="img-fluid" style="width: 50px; height:40px">
                    </td>
                    <td>
                    <form action="{{route('senbud.destroy', $senbud->id)}}" method="post">
                        <a href="{{route('senbud.edit',$senbud->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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
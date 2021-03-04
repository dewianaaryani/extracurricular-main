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
            @foreach($senbud as $upd)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $upd -> name}}</td>
                    <td>{{ $upd -> tempat}}</td>                
                    <td>{{ $upd -> hari}}</td>
                    <td>{{ $upd -> jam}}</td>
                    <td>
                    <form action="{{route('senbud.destroy', $upd->id)}}" method="post">
                        <a href="{{route('senbud.edit',$upd->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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
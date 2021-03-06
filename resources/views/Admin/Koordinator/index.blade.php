@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('koordinator.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nip</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($koordinator as $koordinator)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $koordinator -> name}}</td>
                    <td>{{ $koordinator -> nomor_induk}}</td>                                                    
                    <td>{{ $koordinator -> username}}</td>
                    <td>{{ $koordinator -> password}}</td>
                    <td>
                    <form action="{{route('koordinator.destroy', $koordinator->id)}}" method="post">
                        <a href="{{route('koordinator.edit', $koordinator->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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

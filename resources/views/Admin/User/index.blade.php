@extends('Admin.layout')

@section('content')

<a class="btn btn-success" href="{{ route('user.create') }}">Add</a>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">role</th>
        <th scope="col">rombel</th>
        <th scope="col">rayon</th>
        <th scope="col">Upd Id</th>
        <th scope="col">Senbud Id</th>
        <th scope="col">Action</th>        
        </tr>
    </thead>
    <tbody>
        @foreach($users as $users)    
            <tr>
            <th scope="row">{{ ++ $i }}</th>
            <td>{{ $users -> name}}</td>
            <td>{{ $users -> username}}</td>
            <td>{{ $users -> password}}</td>
            <td>{{ $users -> role}}</td>
            <td>{{ $users -> rombel}}</td>
            <td>{{ $users -> rayon}}</td>
            <td>{{ $users -> upd_id}}</td>
            <td>{{ $users -> senbud_id}}</td>
            <td>
                
            </td>
            </tr>        
        @endforeach
    </tbody>
    </table>
@endsection

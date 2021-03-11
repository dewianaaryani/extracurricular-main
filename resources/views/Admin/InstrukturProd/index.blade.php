@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('instrukturprod.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nip</th>
            <th scope="col">Upd Prod Id</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instrukturprod as $instrukturprod)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $instrukturprod -> name}}</td>
                    <td>{{ $instrukturprod -> nomor_induk}}</td>                                                    
                    <td>{{ $instrukturprod -> updprod_id}}</td>                                                    
                    <td>{{ $instrukturprod -> username}}</td>
                    <td>{{ $instrukturprod -> password}}</td>
                    <td>
                    <form action="{{route('instrukturprod.destroy', $instrukturprod->id)}}" method="post">
                        <a href="{{route('instrukturprod.edit', $instrukturprod->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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

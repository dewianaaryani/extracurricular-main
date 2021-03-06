@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('instruktur.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nip</th>            
            <th scope="col">upd_id</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instruktur as $instruktur)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $instruktur -> name}}</td>
                    <td>{{ $instruktur -> nomor_induk}}</td>                    
                    <td>{{ $instruktur -> upd_id}}</td>                    
                    <td>{{ $instruktur -> username}}</td>
                    <td>{{ $instruktur -> password}}</td>
                    <td>
                    <form action="{{route('instruktur.destroy', $instruktur->id)}}" method="post">
                        <a href="" type="button" class="btn btn-primary">Update</a>
                        
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

@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('pjr.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nip</th>            
            <th scope="col">rayon_id</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pjr as $pjr)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $pjr -> name}}</td>
                    <td>{{ $pjr -> nomor_induk}}</td>                    
                    <td>{{ $pjr -> rayon_id}}</td>                    
                    <td>{{ $pjr -> username}}</td>
                    <td>{{ $pjr -> password}}</td>
                    <td>
                    <form action="{{route('pjr.destroy', $pjr->id)}}" method="post">
                        <a href="{{route('pjr.edit', $pjr->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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

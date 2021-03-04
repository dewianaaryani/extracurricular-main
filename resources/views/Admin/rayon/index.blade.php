@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{ route('rayon.create') }}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rayon as $rayon)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $rayon -> name}}</td>
                    <td>
                    <form action="{{route('rayon.destroy', $rayon->id)}}" method="post">
                        <a href="{{route('rayon.edit', $rayon->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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
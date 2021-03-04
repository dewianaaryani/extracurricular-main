@extends('Admin.layout')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
<a class="btn btn-success" href="{{route('siswa.create')}}">Add</a>
<div class="form-control">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Nis</th>
            <th scope="col">rombel</th>
            <th scope="col">rayon</th>
            <th scope="col">upd_id</th>
            <th scope="col">senbud_id</th>
            <th scope="col">username</th>
            <th scope="col">passwrod</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $siswa)    
                <tr>
                <th scope="row">{{ ++ $i }}</th>
                    <td>{{ $siswa -> name}}</td>
                    <td>{{ $siswa -> nomor_induk}}</td>
                    <td>{{ $siswa -> rombel_id}}</td>
                    <td>{{ $siswa -> rayon_id}}</td>
                    <td>{{ $siswa -> upd_id}}</td>
                    <td>{{ $siswa -> senbud_id}}</td>
                    <td>{{ $siswa -> username}}</td>
                    <td>{{ $siswa -> password}}</td>
                    <td>
                    <form action="" method="post">
                        <a href="{{route('siswa.edit', $siswa->id)}}" type="button" class="btn btn-primary">Update</a>
                        
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

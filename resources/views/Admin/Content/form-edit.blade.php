@extends('Admin.layout.app')
@section('title','Content')
@section('breadcrumb')
                <div class="breadcrumb-item active"><a href="{{url('admin/')}}">Dashboard</a></div>              
              <div class="breadcrumb-item">Content</div>
@endsection
@section('content')
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
<form method="post" action="{{route('admin.form.content.post')}}" enctype="multipart/form-data" class="">
@csrf  

  <div class="form-group">
    <label for="exampleFormControlTextarea1">SIM UPD & Senbud Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="home_desc">{{$content->home_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About SIM UPD Senbud Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="about_desc">{{$content->about_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Contact Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contact_desc">{{$content->contact_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Ekskul Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ekskul_desc">{{$content->ekskul_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Senbud Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="senbud_desc">{{$content->senbud_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Upd Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="upd_desc">{{$content->upd_desc}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Upd Prod Desc</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="updprod_desc">{{$content->updprod_desc}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
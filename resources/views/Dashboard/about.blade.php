@extends('dashboard.layout')
@section('title','About')
@section('banner-title')
    <div data-aos="zoom-in-up">
        <div class="banner-title">
                <h3 class="font-weight-medium">About
            </h3>
        </div>
        <p class="mt-3">{{$content -> about_desc}}
        </p>        
    </div>    
@endsection
@section('content')
    <section class="our-process" id="upd">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" data-aos="fade-up">
                    
                    <h3 class="font-weight-medium text-dark">UPD</h3>                    
                    <p class="font-weight-medium mb-4">{{$content -> ekskul_desc}}
                    </p>                                    
                </div>
                <div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img src="{{asset('assets/upd_senbud/img/basket.png')}}" alt="idea" class="img-fluid">
                </div>
                <div><a href="{{url('upd')}}" class="btn btn-outline-primary">View more</a></div>
            </div>
        </div>
    </section>

    <section class="our-process" id="senbud">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" data-aos="fade-up">
                    
                    <h3 class="font-weight-medium text-dark">Seni Budaya</h3>    
                    <p class="font-weight-medium mb-4">{{$content->senbud_desc}}
                    </p>                    
                </div>
                <div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img src="{{asset('assets/upd_senbud/img/seni_tari1.JPG')}}" alt="idea" class="img-fluid">
                </div>
                <div><a href="senbud.html" class="btn btn-outline-primary">View more</a></div>
            </div>
        </div>
    </section>
    <section class="our-process" id="senbud">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" data-aos="fade-up">
                    
                    <h3 class="font-weight-medium text-dark">UPD Prod</h3>    
                    <p class="font-weight-medium mb-4">{{$content->updprod_desc}}
                    </p>                    
                </div>
                <div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img src="{{asset('assets/upd_senbud/img/seni_tari1.JPG')}}" alt="idea" class="img-fluid">
                </div>
                <div><a href="senbud.html" class="btn btn-outline-primary">View more</a></div>
            </div>
        </div>
    </section>


@endsection

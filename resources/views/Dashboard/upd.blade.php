@extends('dashboard.layout')
@section('title','UPD')
@section('banner-title')
	<div data-aos="zoom-in-up">
        <div class="banner-title">
                <h3 class="font-weight-medium" style="padding-top: 60px;">About
            </h3>
        </div>
        <p class="mt-3" style="padding-right: 80px;">{{$content -> about_desc}}
        </p>        
    </div>    
@endsection
@section('content')
    
<section class="our-projects" id="projects">
				<div class="container">
					<div class="row mb-5">
						<div class="col-sm-12">
							<div class="d-sm-flex justify-content-between align-items-center mb-2">
								<h3 class="font-weight-medium text-dark ">Ekstrakulikuler</h3>
								
							</div>
						</div>
					</div>
				</div>
				<div class="mb-5" data-aos="fade-up">
					<div class="owl-carousel-projects owl-carousel owl-theme">
						<div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>

						<div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>

                        <div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>

                        <div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>

                        <div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>

                        <div class="nama-slider">
						<a href="futsal.html"><div class="item">
							<img src="{{asset('assets/upd_senbud/img/futsal1.JPG')}}" alt="slider">
						</div></a>Futsal</div>						
					</div>
				</div>
				
						
			</section>
@endsection
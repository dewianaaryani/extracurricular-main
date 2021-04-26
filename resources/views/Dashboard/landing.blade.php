<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags --> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>UPD & Senbud</title>
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/vendors/mdi/css/materialdesignicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/vendors/owl.carousel/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/vendors/owl.carousel/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/vendors/aos/css/aos.css')}}">
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/vendors/jquery-flipster/css/jquery.flipster.css')}}">
		<link rel="stylesheet" href="{{asset('assets/upd_senbud/css/style.css')}}">
		<link rel="shortcut icon" href="{{asset('assets/upd_senbud/img/logowk.png')}}" />
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="index.html">UPD & Senbud</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					<div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
						<img src="{{('assets/upd_senbud/images/logo-dark.svg')}}" class="logo-mobile-menu" alt="logo">
						<a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
					</div>
					<ul class="navbar-nav ml-auto align-items-center">
						<li class="nav-item active">
							<a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link active" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contact">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn btn-success" href="{{route('login')}}">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="page-body-wrapper">
			<section id="home" class="home">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div class="row">
										<div class="col-6">
											<div data-aos="zoom-in-up" >
												<div class="banner-title" style="padding-top: 60px;">
														<h3 class="font-weight-medium">SIM UPD & Seni Budaya
													</h3>
												</div>
												<div class="description" style="padding-right: 20px;">
													<p class="mt-3">{{$content -> home_desc}}</p>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="mt-5 mt-lg-0 ml-400">
												<img src="{{asset('assets/upd_senbud/images/group.png')}}" alt="marsmello" class="img-fluid" data-aos="zoom-in-up">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>			
			<section class="our-process" id="about">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" data-aos="fade-up">							
							<h3 class="font-weight-medium text-dark"  style="padding-top: 100px;">About</h3>							
							<p class="font-weight-medium mb-4">{{$content -> about_desc}}</p>
							
						</div>
						<div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
							<img src="{{asset('assets/upd_senbud/images/idea.png')}}" alt="idea" class="img-fluid">
						</div>
						<div><a href="{{url('/about')}}" class="btn btn-outline-primary">View more</a></div>
					</div>
				</div>
			</section>

			<section class="our-process" id="contact">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" data-aos="fade-up">
							
							<h3 class="font-weight-medium text-dark" style="padding-top: 100px;">Contact</h3>
							<p class="font-weight-medium mb-4">{{$content -> contact_desc}}
							</p>							
						</div>
						<div class="col-sm-6 text-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
							<img src="{{asset('assets/upd_senbud/images/idea.png')}}" alt="idea" class="img-fluid">
						</div>
						<div><a href="{{url('contact')}}" class="btn btn-outline-primary">View more</a></div>
					</div>
				</div>
			</section>
			<section></section>
		</div>
		<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<h3>Contact</h3>
							<address>
								<p>Alamat :</p>
								<p class="mb-4">Jl. Raya Wangun No.21, RT.01/RW.06, Sindangsari, Kec. Bogor Timur, Kota Bogor, Jawa Barat 16146</p>
								<div>
									<p>No Telepon :</p>
									<p class="mb-4">(0251) 8242411</p>
								</div>
								<div>
									<p>Email :</p>
									<p class="mb-4"><a href="mailto:prohumasi@smkwikrama.net" class="footer-link">prohumasi@smkwikrama.net</a></p>
								</div>
								<div>
									<p>Website :</p>
									<p class="mb-4"><a href="https://smkwikrama.sch.id/" class="footer-link">smkwikrama.sch.id</a></p>
								</div>
							</address>
							<div class="social-icons">
								<h6 class="footer-title font-weight-bold">
									Social Media
								</h6>
								<div class="d-flex">
									<a href="https://www.youtube.com/channel/UCyhEUzlXbXet57qFnDfdWuw"><i class="mdi mdi-youtube"></i></a>
									<a href="https://web.facebook.com/smkwikrama/"><i class="mdi mdi-facebook-box"></i></a>
									<a href="https://twitter.com/smkwikrama"><i class="mdi mdi-twitter"></i></a>
									<a href="https://www.instagram.com/smkwikrama/"><i class="mdi mdi-instagram"></i></a>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4">
									<h6 class="footer-title"></h6>
									<ul class="list-footer">
										<li></li>
										<li></li>
										<li></a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h6 class="footer-title"></h6>
									<ul class="list-footer">
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h6 class="footer-title">Page</h6>
									<ul class="list-footer">
										<li><a href="index.html" class="footer-link">Home</a></li>
										<li><a href="about.html" class="footer-link">About</a></li>
										<li><a href="contact.html" class="footer-link">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</footer>
		<script src="{{asset('assets/upd_senbud/vendors/base/vendor.bundle.base.js')}}"></script>
		<script src="{{asset('assets/upd_senbud/vendors/owl.carousel/js/owl.carousel.js')}}"></script>
		<script src="{{asset('assets/upd_senbud/vendors/aos/js/aos.js')}}"></script>
		<script src="{{asset('assets/upd_senbud/vendors/jquery-flipster/js/jquery.flipster.min.js')}}"></script>
		<script src="{{asset('assets/upd_senbud/js/template.js')}}"></script>
	</body>
</html>
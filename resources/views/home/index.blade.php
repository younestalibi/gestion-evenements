@extends('layouts.front')
@section('content')
<!--================ Start banner section =================-->
<section class="home-banner-area relative">
	<div class="container-fluid">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="header-right col-lg-6 col-md-6">
				<h1>
					About <br>
					Morocco
				</h1>
				<p class="pt-20">
					Morocco is a North African country with a rich and varied history. The earliest traces of civilization date back to the Paleolithic era, and the country has been influenced by many cultures, including the Phoenicians, Romans, and Arabs. Morocco is also known for its beautiful mountains, deserts, and long Atlantic and Mediterranean coastline.
				</p>
				<a href="{{route('home.about-morocco')}}" class="main_btn">
					See more
					<img src="{{asset('newAssets/img/next.png')}}" alt="">
				</a>
			</div>

			<div class="col-lg-6 col-md-6 header-left">
				<div class="">
					<img class="img-fluid w-100" src="{{asset('newAssets/img/téléchargement (4).jpg')}}" alt="">
				</div>
				<div class="video-popup d-flex align-items-center">
					<a class=" video-play-button " href="https://www.youtube.com/watch?v=OycYHUdAWfQ&t=18s" target="_blank">
						<span></span>
					</a>
					<div class="watch">
						<h5>Watch Intro Video</h5>
						<p>You will love our execution</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End banner section =================-->

<!--================ Start Popular Place Area =================-->
<div class="popular-place-area section_gap">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-5 offset-lg-1">
				<div class="left-content">
					<img class="img1 img-fluid" src="{{asset('newAssets/img/popular/img1.jpg')}}" alt="">
					<img class="img2 img-fluid" src="{{asset('newAssets/img/popular/img2.jpg')}}" alt="">
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="right-content">
					<div class="main_title">
						<h1>Suggested <br>Tours</h1>
						<p>Embark on an Enchanting Journey through Morocco: Unveiling a Land of Rich Culture and Breathtaking Beauty</p>
					</div>
					<div class="counter_area">
						<div class="top-two">
							<a href="{{ route('home.suggested') }}" class="main_btn">
								Suggested Tours
								<img src="{{asset('newAssets/img/next.png')}}" alt="">
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================ End Popular Place Area =================-->

<!--================ Start Packages Service Area =================-->
<section class="package-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="main_title">
					<h1>Services</h1>
					<p>From luxurious accommodations to delectable dining experiences, Morocco offers a wealth of services to cater to your every need and desire.</p>
					<a href="{{ route('home.service.services-all') }}" class="main_btn">
						Browse all Services
						<img src="{{asset('newAssets/img/next.png')}}" alt="next">
					</a>
				</div>
			</div>
			<div class="col-lg-6 offset-lg-1 col-md-12">
				<div class="owl-carousel active-gallery-carousel">
					<!-- single gallery -->
					@foreach($services as $service)
					<div class="single-gallery">
						<img class="img-fluid" src="{{ asset('users/services/' . $service->image) }}" alt="">
						<div class="gallery-content">
							<div class="title align-items-center justify-content-between d-flex">
								<p>{{ $service->title}}</p>
								<h4>{{ $service->type}}</h4>
							</div>
							<h4>{{Str::limit($service->description, $limit = 50, $end = '...')}}</h4>
							<div class="review-title justify-content-between d-flex">
								<p>Proper Guided Tour</p>
								<div class="review">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
						<div class="light-box">
							<a href="img/pac1.jpg" class="img-popup">
								<span class="lnr lnr-pushpin"></span>
							</a>
						</div>
					</div>
					@endforeach
					<!-- single gallery -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Portfolio Service Area =================-->

<!--================ Start Amenities Area =================-->
<section class="amenities-area section_gap">
	<div class="container">
		<div class="row align-items-end justify-content-left">
			<div class="col-lg-5">
				<div class="main_title">
					<h1>Destinations</h1>
					<p>Unveiling the Magic of Morocco: A Calendar of Unforgettable Experiences</p>
					<p>Immerse yourself in the vibrant tapestry of Moroccan culture with our curated selection of events.</p>
				</div>
			</div>
			<div class="counter_area">
				<div class="top-two">
					<a href="{{route('home.destination.destinations')}}" class="main_btn">
						More Destinations
						<img src="{{asset('newAssets/img/next.png')}}" alt="">
					</a>
				</div>

			</div>
		</div>
		<div class="row justify-content-center">
			<!-- single-blog -->
			@foreach($destinations as $destination)
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="single-amenities">
					<div class="amenities-thumb">
						<img class="img-fluid" src="{{asset('users/destinations/'.$destination->image)}}" alt="">
					</div>
					<div class="amenities-details">
						<div class="amenities-meta">
							<span></span>
						</div>
						<h5><a href="{{ route('home.destination.show',['destination'=>$destination->name]) }}">{{ $destination->name }}</a></h5>
						<p>{{Str::limit($destination->description, $limit = 50, $end = '...')}}</p>
					</div>
				</div>
			</div>
			@endforeach
			<!-- single-blog -->

		</div>
	</div>
</section>
<!--================ End Amenities Area =================-->


<!--================ End Package Search Area =================-->



<!--================ Start Newsletter Area =================-->
<section class="newsletter-area section_gap">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-5">
				<div class="main_title">
					<h1>Events</h1>
					<p>Immerse yourself in the vibrant tapestry of Moroccan culture with our curated selection of events.</p>
					<div id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">


							<div class="counter_area">
								<div class="top-two">
									<a href="{{ route('home.event.events') }}" class="main_btn">
										All Event
										<img src="{{asset('newAssets/img/next.png')}}" alt="">
									</a>
								</div>
							</div>
							<div class="mt-10 info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 offset-lg-1">
				<img class="img-fluid nw-img" src="{{ asset('newAssets/img/nwl-img.png') }}" alt="">
			</div>
		</div>
</section>
<!--================ End Newsletter Area =================-->
@endsection
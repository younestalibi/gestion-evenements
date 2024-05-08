@extends('layouts.front')
@section('content')
<!--================ Start Amenities Area =================-->
<section class="amenities-area section_gap">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h1>Destinations <br>For you</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
            </div>
        </div>
        <!-- single-blog -->
        @if(count($destinations)>0)
        <div class="row justify-content-center">
            @foreach($destinations as $destination)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-5">
                <div class="single-amenities h-100">
                    <div class="amenities-thumb">
                        <img class="img-fluid" src="{{ asset('users/destinations/' . $destination->image) }}" alt="">
                    </div>
                    <div class="amenities-details">
                        <h5><a href="{{route('home.destination.show',['destination'=>$destination->name])}}">
                                {{$destination->name}}</a></h5>
                        <p>{{ Str::limit($destination->description, $limit = 50, $end = '...')}}</p>
                        <small class="text-muted">Last updated {{ $destination->created_at->diffforhumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-12 display-4">Destination not found</div>
        </div>
        @endif
    </div>
</section>
<!--================ End Amenities Area =================-->

@endsection
@extends('layouts.front')
@section('content')
<!--================ Start Amenities Area =================-->
<section class="amenities-area section_gap">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h1>Suggested Tours<br>For you</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
            </div>
        </div>
        <!-- single-blog -->
        @if(count($suggestions)>0)
        <div class="row justify-content-center">
            @foreach($suggestions as $suggestion)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-5">
                <div class="single-amenities h-100">
                    <div class="amenities-thumb">
                        <img class="img-fluid" src="{{ asset('users/suggestions/' . $suggestion->image) }}" alt="">
                    </div>
                    <div class="amenities-details">
                        <div class="amenities-meta">
                            <span>Within a Shor Time </span>
                        </div>
                        <h5><span >{{$suggestion->name}}</span></h5>
                        <p>{{Str::limit($suggestion->description, $limit = 200, $end = '...')}}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-12 display-4">No Suggested tour found</div>
        </div>
        @endif
    </div>
</section>

<!--================ End Amenities Area =================-->



@endsection
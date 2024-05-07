@extends('layouts.front')
@section('content')
<!--================ Start banner section =================-->
<section class="home-banner-area relative">
    <div class="container-fluid">
        @if(!is_null($destination))

        <div class="row p-4 mb-5 d-flex align-items-center justify-content-center">
            <div class="header-right col-lg-6 col-md-6">
                <h1>
                    {{ $destination->name }}
                </h1>
                <p class="pt-20">
                    {{ $destination->description }}
                </p>
                <h4>Most Popular places</h4>
                <ul class="list-group mb-4">
                    @foreach($destination->places as $place)
                    <li class="">{{ $place }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 header-left">
                <div class="">
                    <img style="height: 500px;object-fit:cover" class="img-fluid w-100" src="{{ asset('users/destinations/' . $destination->image) }}" alt="{{ $destination->name }}">
                </div>
                <div class="video-popup d-flex align-items-center">
                </div>
            </div>

        </div>

        @else
        <h1 class="vh-100 ">Destination Not found!</h1>
        @endif
    </div>
</section>
<!--================ End banner section =================-->


@endsection
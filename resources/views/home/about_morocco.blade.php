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
            </div>

            <div class="col-lg-6 col-md-6 header-left">
                <div class="">
                    <img class="img-fluid w-100" src="{{asset('newAssets/img/téléchargement (4).jpg')}}" alt="">
                </div>
                <div class="video-popup d-flex align-items-center">
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End banner section =================-->

@endsection
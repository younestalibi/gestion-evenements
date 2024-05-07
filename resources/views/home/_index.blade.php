@extends('layouts.app')
@section('content')
@include('partials._navbar')

<svg style="display:none;">
    <symbol id="one" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="white" d="M0,96L1440,320L1440,320L0,320Z"></path>
    </symbol>
    <symbol id="two" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="white" d="M0,32L48,37.3C96,43,192,53,288,90.7C384,128,480,192,576,197.3C672,203,768,149,864,138.7C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </symbol>
    <symbol id="three" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="white" d="M0,128L30,144C60,160,120,192,180,197.3C240,203,300,181,360,192C420,203,480,245,540,245.3C600,245,660,203,720,192C780,181,840,203,900,181.3C960,160,1020,96,1080,80C1140,64,1200,96,1260,122.7C1320,149,1380,171,1410,181.3L1440,192L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
    </symbol>
    <symbol id="four" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="white" d="M0,192L120,192C240,192,480,192,720,165.3C960,139,1200,85,1320,58.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
    </symbol>
    <symbol id="five" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="white" d="M0,32L120,69.3C240,107,480,181,720,192C960,203,1200,149,1320,122.7L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
    </symbol>
    <symbol id="six" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="rgba(255, 255, 255, .8)" d="M0,32L120,64C240,96,480,160,720,160C960,160,1200,96,1320,64L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
    </symbol>
</svg>
<section class="hero-section position-relative">
    <video src="https://www.shutterstock.com/shutterstock/videos/1050903742/preview/stock-footage-morocco-flag-isolated-with-sunset-and-mosque-background-marrakech.webm" autoplay loop muted playsinline></video>
    <div class="overlay position-absolute d-flex align-items-center justify-content-center font-weight-bold text-white h2 mb-0">
        <blockquote class="p-4 mb-0">
            <p>By discovering nature, you discover yourself. </p>
            <footer class="blockquote-footer text-white text-right">Maxime Lagacé</footer>
        </blockquote>
    </div>
    <svg class="position-absolute w-100">
        <use xlink:href="#three"></use>
    </svg>
</section>
<section class="photos-section py-5 d-flex justify-content-center">
    <div class="container">
        <div class="row">
            <h1 class="col-12 text-center my-5">EXPLORE SERVICES AVAILABLE JUST FOR YOU</h1>
            @foreach($services as $service)
            <div class="col-12 col-sm-6 col-xl-3 d-flex card-outer">
                <div class="card">
                    <div class="position-relative">
                        <img style="height: 180px;object-fit:cover" src="{{ asset('users/services/' . $service->image) }}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->title}}</h5>
                        <p class="card-text">{{Str::limit($service->description, $limit = 50, $end = '...')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
   
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('home.service.services-all') }}" class="btn btn-outline-success" role="button" >See More Services</a>
            </div>
        </div>
        <hr class="my-5">
        <div class="row">
            <h1 class="col-12 text-center my-5">EXPLORE CURRENT EVENTS IN MOROCCO</h1>
            @foreach($events as $event)
            <div class="col-12 col-sm-6 col-xl-3 d-flex card-outer">
                <div class="card">
                    <div class="position-relative">
                        <img style="height: 180px;object-fit:cover" src="{{ asset('users/events/' . $event->image) }}" class="card-img-top" alt="">
                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{Str::limit($event->description, $limit = 50, $end = '...')}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('home.event.events') }}" class="btn btn-outline-success" role="button" >See More Events</a>
            </div>
        </div>

    </div>
</section>
<section class="cover-section position-relative">
    <div class="cover" style="background-image: url(https://images.pexels.com/photos/5472524/pexels-photo-5472524.jpeg?auto=compress&cs=tinysrgb&w=600);">
        <img src="https://images.pexels.com/photos/5472524/pexels-photo-5472524.jpeg?auto=compress&cs=tinysrgb&w=600" class="img-fluid invisible" alt="" />
    </div>
    <svg class="position-absolute w-100">
        <use xlink:href="#two"></use>
    </svg>
</section>

<style>
    :root {
        --overlay: rgba(0, 0, 0, 0.35);
        --box-shadow: 0 5px 20px 2px rgba(0, 0, 0, 0.15);
        --green: #528119;
        --red: #e74c3c;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    a {
        color: inherit;
    }

    a:hover {
        color: currentColor;
        text-decoration: none;
    }

    .cover {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .overlay {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--overlay);
    }

    .btn-outline-success {
        color: var(--green);
    }

    .btn-outline-success:hover,
    .btn-outline-success:not(:disabled):not(.disabled):active {
        background: var(--green);
    }

    .btn-outline-success,
    .btn-outline-success:hover,
    .btn-outline-success:not(:disabled):not(.disabled):active {
        border-color: var(--green);
    }


    /* FIRST SECTION
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    .hero-section {
        height: 100vh;
    }

    .hero-section video {
        /*position: absolute;
  top: 0;
  left: 0;*/
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-section svg {
        bottom: 0;
        left: 0;
        height: 30vh;
    }


    /* SECOND SECTION
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    .photos-section .card-outer {
        margin-bottom: 30px;
    }

    .photos-section .card {
        border: none;
        box-shadow: var(--box-shadow);
    }

    .photos-section .card svg {
        bottom: 0;
        left: 0;
        height: 55px;
    }


    /* THIRD SECTION
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    .cover-section .cover {
        background-attachment: fixed;
    }

    .cover-section .caption {
        bottom: 30px;
        left: 15px;
        z-index: 1;
    }

    .cover-section svg {
        bottom: 0;
        left: 0;
        height: 30vh;
    }


    /* FOOTER
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    .page-footer {
        padding: 50px 0;
        box-shadow: var(--box-shadow);
    }

    .page-footer .credits {
        line-height: normal;
    }

    .page-footer span {
        color: var(--red);
    }


    /* MQ
–––––––––––––––––––––––––––––––––––––––––––––––––– */
    @media screen and (min-width: 768px) {
        .cover-section .caption {
            bottom: 50px;
        }

        .cover-section svg {
            height: 50vh;
        }
    }

    @media screen and (min-width: 1200px) {
        .photos-section .card-outer {
            margin-bottom: 0;
        }
    }
</style>
<script>
    // we use it as an alternative to height: 100vh for better browser support especially on iOS devices
    const hero = document.querySelector(".hero-section");
    hero.style.height = window.innerHeight + "px";

    window.addEventListener("resize", function() {
        hero.style.height = this.innerHeight + "px";
    });
</script>

@include('partials._footer')

@endsection
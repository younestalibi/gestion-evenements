<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Morocco in your hand</title>
    <meta name="api-url" content="http://127.0.0.1:8000">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('newAssets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/jquery-ui/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/swiper/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/vendors/scroll/jquery.mCustomScrollbar.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('newAssets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('newAssets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">

    <!-- map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">




</head>

<body>

    <!--================ Offcanvus Menu Area =================-->
    <div class="side_menu">
        <div class="logo">
            <a href="{{route('home')}}">
                <img src="{{asset('assets/morocco.png')}}" alt="" style="width: 200px; height: auto;">
            </a>
        </div>
        <ul class="list menu-left">
            <li>
                <a href="{{route('home.about-morocco')}}">About Morocco</a>
            </li>
            <li>
                <a href="{{ route('home.suggested') }}">Suggested Tours</a>
            </li>
            <li>
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                        Services
                    </button>

                    <div class="dropdown-menu">

                        @foreach (\App\Models\Service::SERVICE_TYPES as $key=>$value)
                        <a class="dropdown-item" href="{{ route('home.service.services',['service'=>$key]) }}">{{ $value }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                        Destinations
                    </button>
                    <div class="dropdown-menu">
                        @foreach (\App\Models\Service::POPULAR_CITIES as $key=>$value)
                        <a class="dropdown-item" href="{{ route('home.destination.show',['destination'=>$key]) }}">{{ $value }}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('home.event.events') }}">Events</a>
            </li>
        </ul>
    </div>
    <!--================ End Offcanvus Menu Area =================-->

    <!--================ Canvus Menu Area =================-->
    <div class="canvus_menu">
        <div class="container">
            <div class="toggle_icon" title="Menu Bar">
                <span></span>
            </div>
        </div>
    </div>
    <!--================ End Canvus Menu Area =================-->

    <section class="top-btn-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    @guest
                    <a href="{{ route('login') }}" class="main_btn">
                        Jion Us
                        <img src="{{asset('newAssets/img/next.png')}}" alt="">
                    </a>
                    @endguest
                    @auth
                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" style="width:100px;margin-left:auto;z-index:44;position:sticky" id="navbar-collapse">

                        <ul class="navbar-nav text-dark flex-row align-items-center ms-auto ">
                            <!-- Guest -->
                            @guest
                            <li class="nav-item lh-1 me-3">
                                <a class="nav-link" href="{{ route('login') }}">Join Us</a>
                            </li>
                            @endguest
                            <!-- Auth -->
                            @auth
                            
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <span class="mx-3 text-dark">{{ Auth::user()->name }}</span>
                                        @if (Auth::user()->Profile->img_path == null)
                                        <img src="{{ asset('users/profile/1.png') }}" alt="profile" class="w-px-40 h-auto rounded-circle img-fluid" />
                                        @else
                                        <img src="{{ asset('users/profile/' . Auth::user()->Profile->img_path) }}" alt="profile" class="w-px-40 h-auto img-fluid rounded-circle" />
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if (Auth::user()->Profile->img_path == null)
                                                        <img src="{{ asset('users/profile/1.png') }}" alt="profile" class="w-px-40 h-auto rounded-circle img-fluid" />
                                                        @else
                                                        <img src="{{ asset('users/profile/' . Auth::user()->Profile->img_path) }}" alt="profile" class="w-px-40 h-auto img-fluid rounded-circle" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="">{{ Auth::user()->email }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <i class="bi bi-person me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                        @if (Auth::user()->role == 'Administrator')
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">
                                            <i class="fa fa-sliders me-2" aria-hidden="true"></i>
                                            <span class="align-middle">Dashboard</span>
                                        </a>
                                        @elseif (Auth::user()->role == 'Partner')
                                        <a class="dropdown-item" href="{{ route('partner.index') }}">
                                            <i class="fa fa-sliders me-2" aria-hidden="true"></i>
                                            <span class="align-middle">Dashboard</span>
                                        </a>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    @yield('content')
    <!--================ start footer Area  =================-->
    <footer class="footer-area">
        <div class="container">
            <div class="row footer-top">
                <div class="col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Crafted</h6>
                        <p>
                            The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Emergency Numbers in Morocco</h6>
                        <p>
                            19: Police, Firefighters, and Ambulance Services (free) <br>
                            112: European Emergency Number (free) <br>
                            999: Medical Help (paid number) <br>
                            177: Royal Gendarmerie (free) (rural areas)
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
            <div class="container">
                <div class="row justify-content-between">
                    <div>
                        <p class="footer-text m-0">
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Nihal</a>
                        </p>
                    </div>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('newAssets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('newAssets/js/popper.js')}}"></script>
    <script src="{{asset('newAssets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('newAssets/js/stellar.js')}}"></script>
    <script src="{{asset('newAssets/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/isotope/isotope-min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('newAssets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('newAssets/js/mail-script.js')}}"></script>
    <script src="{{asset('newAssets/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/swiper/js/swiper.min.js')}}"></script>
    <script src="{{asset('newAssets/vendors/scroll/jquery.mCustomScrollbar.js')}}"></script>
    <script src="{{asset('newAssets/js/theme.js')}}"></script>
    <script src="{{asset('newAssets/js/index.js')}}"></script>

    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

</body>

</html>
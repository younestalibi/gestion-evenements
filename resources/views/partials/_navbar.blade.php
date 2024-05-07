<!-- Navbar -->
<style>
    .dropdown-item {
        color: black !important;
    }
</style>
<nav class="w-100 border layout-navbar container-xxl text-dark navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div>
        <a class="nav-item nav-link px-0 me-xl-4" href="{{ route('home') }}">
            <img src="{{ asset('assets/morocco.png') }}" width='100' alt="morocco">
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center mx-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Destination
                </a>
                <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                    @foreach (\App\Models\Service::POPULAR_CITIES as $key=>$value)
                    <li><a class="dropdown-item" href="{{ route('home.destination.show',['destination'=>$key]) }}">{{ $value }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.about-morocco') }}">About Morocco</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.suggested') }}">Suggested Tours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home.event.events') }}">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                    @foreach (\App\Models\Service::SERVICE_TYPES as $key=>$value)
                    <li><a class="dropdown-item" href="{{ route('home.service.services',['service'=>$key]) }}">{{ $value }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav text-dark flex-row align-items-center ms-auto">
            <!-- Guest -->
            @guest
            <li class="nav-item lh-1 me-3">
                <a class="nav-link" href="{{ route('login') }}">Join Us</a>
            </li>
            @endguest
            <!-- Auth -->
            @auth
            <li class="nav-item lh-1 me-3">
                {{ Auth::user()->name }}
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
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
                            <i class="bx bx-user me-2"></i>
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
</nav>
<!-- / Navbar -->
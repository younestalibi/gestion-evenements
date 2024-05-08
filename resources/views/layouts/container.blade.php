@extends('layouts.app')
@section('content')
    <!-- Layout wrapper -->
    <style>
        .notify{
            position: absolute;
            top: 22px;
            z-index: 1;
            left: 21px;
        }
    </style>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container bg-white">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('home') }}" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase text-center">
                        <img src="{{asset('assets/morocco.png')}}" width='170' alt="morocco">
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                @if (Auth::user()->role === 'Administrator')

                    <!-- Dashboard -->
                    <li class="menu-item @if (request()->routeIs('admin.index')) active open @endif">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    
                    <!--All Users-->
                    <li class="menu-item @if (request()->routeIs('users.index')) active open @endif">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bxs-group'></i>
                            <div data-i18n="Account">Users</div>
                        </a>
                    </li>
                    
                    <!--All Events-->
                    <li class="menu-item @if (request()->routeIs('admin.event.index')) active open @endif">
                        <a href="{{ route('admin.event.index') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-briefcase-alt-2'></i>
                            <div data-i18n="Events text-info">Events</div>
                        </a>
                    </li>
                    <!--All Messages-->
                    <li class="menu-item @if (request()->routeIs('admin.message.index')) active open @endif">
                        <a href="{{ route('admin.message.index') }}" class="menu-link">
                            <i class="fa-regular fa-envelope menu-icon"></i>
                            <div data-i18n="Events text-info">Messages</div>
                        </a>
                    </li>
                    <!--All Destinations-->
                    <li class="menu-item @if (request()->routeIs('admin.destination.index')) active open @endif">
                        <a href="{{ route('admin.destination.index') }}" class="menu-link">
                        <i class="fa-solid fa-location-dot menu-icon"></i>
                            <div data-i18n="Events text-info">Destinations</div>
                        </a>
                    </li>
                    <!--All Services-->
                    <li class="menu-item @if (request()->routeIs('admin.service.index')) active open @endif">
                        <a href="{{ route('admin.service.index') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-briefcase-alt-2'></i>
                            <div data-i18n="Services text-info">Services</div>
                        </a>
                    </li>
                    <!--All Suggestions Tours-->
                    <li class="menu-item @if (request()->routeIs('admin.suggestion.index')) active open @endif">
                        <a href="{{ route('admin.suggestion.index') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-briefcase-alt-2'></i>
                            <div data-i18n="Services text-info">Suggestions Tours</div>
                        </a>
                    </li>
                    
                    @elseif (Auth::user()->role === 'Partner')
                    <!-- Dashboard -->
                    <li class="menu-item @if (request()->routeIs('partner.index')) active open @endif">
                        <a href="{{ route('partner.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!--All Services-->
                    <li class="menu-item @if (request()->routeIs('partner.service.index')) active open @endif">
                        <a href="{{ route('partner.service.index') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-briefcase-alt-2'></i>
                            <div data-i18n="Services text-info">Services</div>
                        </a>
                    </li>
                    <!--All Messages-->
                    <li class="menu-item @if (request()->routeIs('partner.message.index')) active open @endif">
                        <a href="{{ route('partner.message.index') }}" class="menu-link">
                            <i class="fa-regular fa-envelope menu-icon"></i>
                            <div data-i18n="Events text-info">Messages</div>
                        </a>
                    </li>
                    @elseif (Auth::user()->role === 'Customer')
                    @endif
            

                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
            @include('partials._navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        @yield('m-content')
                        <!--/ Layout Demo -->
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0 ">
                            Copyright &copy; 2024 MOROCCO All Rights Reserved.
                            </div>
                            
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection

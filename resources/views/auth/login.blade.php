@extends('layouts.auth')
@section('content')

<section class="ftco-section">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex align-items-center p-5">
                    <div class="img d-flex justify-center align-items-center flex-column">
                        <img src="{{asset('assets/morocco.png')}}" alt="" style="width: 100%;object-fit:cover">
                        <div class="text-center">
                            <p>Welcome to MoroccoInYourHand!</p>
                            <p>Your ultimate guide to discovering the wonders of Morocco</p>
                            <p>Explore breathtaking destinations, plan your trip with precision, and enjoy</p>
                            <p>major events.</p>
                            <p>Create an account today and start exploring!</p>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                        </div>
                        <form class="signin-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email or
                                    Username</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email .." autofocus value="{{ old('email') }}" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked name="remember" />
                                        <span class="checkmark"></span>
                                    </label>

                                </div>

                            </div>
                        </form>
                        <p class="text-center">Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
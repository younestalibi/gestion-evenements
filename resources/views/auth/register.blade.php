@extends('layouts.auth')
@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
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
                                <h3 class="mb-4">Sign Up</h3>
                            </div>
                        </div>
                        <form class="signin-form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter your email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">User Type</label>
                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="">--Select user type--</option>
                                    <option value="Customer" {{ old('role') == 'Customer' ? 'selected' : '' }}>Visitor</option>
                                    <option value="Partner" {{ old('role') == 'Partner' ? 'selected' : '' }}>Partner</option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row form-group mb-3">
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="{{ old('password') }}" />
                                    </div>
                                </div>
                                <div class="col form-password-toggle">
                                    <label class="form-label" for="password">password confirm</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" value="{{ old('password_confirmation') }}" />
                                    </div>
                                </div>
                                <div class="col-12 mt-1 text-center">
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                        <input checked class="form-check-input  @error('terms') is-invalid @enderror " type="checkbox" id="terms" name="terms" />
                                        <span class="checkmark"></span>
                                    </label>

                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                            </div>

                        </form>
                        <p class="text-center">Already a member? <a href="{{ route('login') }}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
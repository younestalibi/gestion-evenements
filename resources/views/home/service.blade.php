@extends('layouts.front')
@section('content')
<style>
    .notify {
        position: absolute;
        top: 22px;
        z-index: 1;
        left: 321px;
    }
</style>
<div class="div p-5">
    <div class="row my-4 mx-2">
    <a href="{{route('home')}}"><b class=" py-2"><i class="fa-solid fa-chevron-left mx-2"></i></i>Go back home</b></a>
    </div>
    <div class="row my-4 mx-2">
        <h1>{{$service->title}}</h1>
    </div>
    <div class="row">
        <div class="col-md-8 col-12">
            <img src="{{asset('users/services/' . $service->image)}}" alt="image" class="image">
            <h3 class="mt-4">service information</h3>
            <div class="row">
                <div class="col-6">
                    <b>Location: </b>{{ $service->location }}
                </div>
                <div class="col-6">
                    <b>Contact Number: </b>{{ $service->contact_number }}
                </div>
                <div class="col-6">
                    <b>Open at: </b>{{ $service->open_time }}
                </div>
                <div class="col-6">
                    <b>Close at: </b>{{ $service->close_time }}
                </div>
                <div class="col-6">
                    <b>Type: </b>{{ $service->type }}
                </div>
            </div>
            <hr>
            <div>
                <h3>About The Service</h3>
                <p class="lead mt-4">{{$service->description}}</p>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h2>Contact Us</h2>
            <p>
                We'd love to hear from you! Whether you have a question about our services or need assistance, or just want to say hello, feel free to reach out. Don't hesitate to get in touch with us using the form provided. We look forward to assisting you and making your experience with us exceptional!
            </p>
        </div>
        <div class="col-6">
            <form action="{{route('home.message.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <label class="form-label" for="basic-default-name">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}" id="name" name="name" placeholder="Full Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <label class="form-label" for="basic-default-phone">Phone Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror " value="{{old('phone')}}" id="phone" name="phone" placeholder="Phone Number">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-3">
                        <label class="form-label" for="basic-default-email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror " value="{{old('email')}}" id="email" name="email" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-12 col-sm-12 mb-3">
                        <label for="floatingTextarea2">Message</label>
                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="Message" style="max-height:120px ;height: 100px">
                        {{ old('message') }}
                        </textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="hidden" name="type" value="service">
                    <input type="hidden" name="user_id" value="{{ $service->user->id }}">
                    <input type="hidden" name="item_id" value="{{ $service->id }}">
                    <div class="col-md-12 col-sm-12 mb-3 text-center">
                        <button type="submit" class="btn btn-info">
                            <span class="tf-icons bx bxs-save"></span> &nbsp; Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .image {
        height: 400px;
        object-fit: cover;
        width: 100%;
        box-shadow: 0px 0px 2px 0px;
        border-radius: 10px;
    }
</style>
<script>
    var latitude = "{{$service->latitude}}";
    var longitude = "{{$service->longitude}}";

    var map = L.map('map').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Saved Location')
        .openPopup();
</script>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@if (session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif

@if (session('error'))
<script>
    toastr.error("{{ session('error') }}");
</script>
@endif

@endsection
<script>
    toastr.error("hi");
    alert('hi')
</script>
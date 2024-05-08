@extends('layouts.container')

@section('title')
Edit Service
@endsection


@section('m-content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1">
        <div class="row">
            <div class="col-md-12">
                <!-- All Services -->
                <div class="card">
                    <h5 class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.service.index') }}" class="btn btn-info">
                                <span class="tf-icons fa-solid fa-angles-left"></span> &nbsp; Back
                            </a>
                        </div>
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.service.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $service->id }}">


                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-title">Title of Service</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror " value="{{old('title',$service->title)}}" id="title" name="title" placeholder="Title of Service">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-open_time">Open time of service</label>
                                        <input type="time" class="form-control @error('open_time') is-invalid @enderror " value="{{old('open_time',$service->open_time)}}" id="open_time" name="open_time" placeholder="Open time of service">
                                        @error('open_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-close_time">Close time of service</label>
                                        <input type="time" class="form-control @error('close_time') is-invalid @enderror " value="{{old('close_time',$service->close_time)}}" id="close_time" name="close_time" placeholder="Close time of service">
                                        @error('close_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label for="floatingTextarea2">Description of service</label>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description of service" style="max-height:120px ;height: 100px">
                                        {{ old('description',$service->description) }}
                                        </textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-location">Location of Service</label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror " value="{{old('location',$service->location)}}" id="location" name="location" placeholder="Location of service">
                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-contact_number">Contact Number</label>
                                        <input type="text" class="form-control @error('contact_number') is-invalid @enderror " value="{{old('contact_number',$service->contact_number)}}" id="contact_number" name="contact_number" placeholder="Contact number">
                                        @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-type">Select Service Type:</label>
                                        <select class="form-control @error('type') is-invalid @enderror " id="type" name="type">
                                            <option value="">-- Select a Service Type --</option>
                                            @foreach ($types as $key=>$value)
                                            <option {{ old('type',$service->type)==$key?'selected':'' }} value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-start align-items-center gap-4">
                                        <div class="col-5">
                                            <img src="{{ asset('users/services/'.$service->image) }}" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar" />
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-warning me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload new photo</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" name="image" class="account-file-input @error('image') is-invalid @enderror" hidden accept="image/png, image/jpeg" />
                                            </label>
                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row p-5 ">
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                    <input type="hidden" name="latitude" id="latitude" value="{{$service->latitude}}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{$service->longitude}}">
                                </div>
                                <div class="col-md-12 col-sm-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-info">
                                        <span class="tf-icons bx bxs-save"></span> &nbsp; Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- All Users -->
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
@endsection


@section('scripts')
<script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@if (session('success'))
<script>
    toastr.success('{{ session(' + success + ') }}');
</script>
@endif

@if (session('error'))
<script>
    toastr.error('{{ session(' + error + ') }}');
</script>
@endif
<script>
    var latitude = {{$service->latitude}};
    var longitude = {{$service->longitude}};
    var map = L.map('map').setView([51.505, -0.09], 13); // Set initial view (latitude, longitude, zoom level)

    // Add the OpenStreetMap tiles to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker to the map
    var marker = L.marker([latitude, longitude], {
        draggable: true // Make the marker draggable
    }).addTo(map);

    // Update the latitude and longitude input fields when the map is clicked
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Update the hidden input fields with the clicked latitude and longitude
        document.getElementById('latitude').value = lat.toFixed(7);
        document.getElementById('longitude').value = lng.toFixed(7);

        // Move the marker to the clicked location
        marker.setLatLng([lat, lng]);
    });

    // Update the latitude and longitude input fields when the marker is dragged
    marker.on('dragend', function(event) {
        var lat = event.target.getLatLng().lat;
        var lng = event.target.getLatLng().lng;

        // Update the hidden input fields with the marker's latitude and longitude
        document.getElementById('latitude').value = lat.toFixed(7);
        document.getElementById('longitude').value = lng.toFixed(7);
    });
</script>

@endsection
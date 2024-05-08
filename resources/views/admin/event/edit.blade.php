@extends('layouts.container')

@section('title')
Edit Event
@endsection

@section('m-content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1">
        <div class="row">
            <div class="col-md-12">
                <!-- All Events -->
                <div class="card">
                    <h5 class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.event.index') }}" class="btn btn-info">
                                <span class="tf-icons fa-solid fa-angles-left"></span> &nbsp; Back
                            </a>
                        </div>
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-name">Name of Event</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{old('name',$event->name)}}" id="name" name="name" placeholder="Name of event">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-date">Date of Event</label>
                                        <input type="date" class="form-control @error('date') is-invalid @enderror " value="{{old('date',$event->date)}}" id="date" name="date" placeholder="Date of event">
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-time">Time of Event</label>
                                        <input type="time" class="form-control @error('time') is-invalid @enderror " value="{{old('time',$event->time)}}" id="time" name="time" placeholder="Time of event">
                                        @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label for="floatingTextarea2">Description of event</label>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description of event" style="max-height:120px ;height: 100px">
                                        {{ old('description',$event->description) }}
                                        </textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-location">Location of Event</label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror " value="{{old('location',$event->location)}}" id="location" name="location" placeholder="Location of event">
                                        @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-organizer">Organizer of Event</label>
                                        <input type="text" class="form-control @error('organizer') is-invalid @enderror " value="{{old('organizer',$event->organizer)}}" id="organizer" name="organizer" placeholder="Organizer of event">
                                        @error('organizer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-price">Price of Event</label>
                                        <input type="number" min="0" class="form-control @error('price') is-invalid @enderror " value="{{old('price',$event->price)}}" id="price" name="price" placeholder="Price of event">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                        <label class="form-label" for="basic-default-seats_available">Seats Available of Event</label>
                                        <input type="number" min="0" class="form-control @error('seats_available') is-invalid @enderror " value="{{old('seats_available',$event->seats_available)}}" id="seats_available" name="seats_available" placeholder="Seats available of event">
                                        @error('seats_available')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-start align-items-center gap-4">
                                        <div class="col-5">
                                            <img src="{{ asset('users/events/'.$event->image) }}" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar" />
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
@endsection
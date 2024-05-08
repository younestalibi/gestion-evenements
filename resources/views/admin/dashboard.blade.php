@extends('layouts.container')
@section('title')
Dashboard
@endsection

@section('m-content')

<div class="row">
    <div class="col-12">
        <h1 class="display-1 font-monospace ">OverView</h1>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header fs-3 font-monospace  px-0">
                    Total Users
                </div>
                
                <h3 class="card-title fw-semibold mb-2">
                {{ $CountUsers }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header fs-3 font-monospace  px-0">
                    Total Events
                </div>
                <h3 class="card-title  fw-semibold mb-2">
                {{ $CountEvents }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header font-monospace fs-3  px-0">
                    Total Services
                </div>
                
                <h3 class="card-title fw-semibold mb-2">
                    {{ $CountServices }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header font-monospace fs-3  px-0">
                    Total Messages
                </div>
                
                <h3 class="card-title fw-semibold mb-2">
                    {{ $CountMessages }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header font-monospace fs-3  px-0">
                    Total Destinations
                </div>
                
                <h3 class="card-title fw-semibold mb-2">
                    {{ $CountDestinations }}
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <div class="card-header font-monospace fs-3  px-0">
                    Total Suggestions
                </div>
                
                <h3 class="card-title fw-semibold mb-2">
                    {{ $CountSuggestions }}
                </h3>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
    <style>
        .card {
            opacity: 0.7 !important;
            cursor: pointer;
            transition: 0.2s;
        }

        .card:hover {
            opacity: 1 !important;
            scale: 1.02;
        }

    </style>
@endsection

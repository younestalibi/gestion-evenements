@extends('layouts.container')

@section('title')
    All Services
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
                                All Services
                                
                            </div>
                        </h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped" id="CarTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Open Time</th>
                                        <th>Close Time</th>
                                        <th>Contact</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if (count($services) > 0)
                                    <tbody class="table-border-bottom-0">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td>{{ Str::limit($service->description, $limit = 50, $end = '...')  }}</td>
                                                <td class="col-2">
                                                    <img class="img-fluid"
                                                        src="{{ asset('users/services/' . $service->image) }}" />
                                                </td>
                                                <td>{{ $service->type }}</td>
                                                <td>{{ $service->location }}</td>
                                                <td>{{ $service->open_time }}</td>
                                                <td>{{ $service->close_time }}</td>
                                                <td>{{ $service->contact_number }}</td>
                                                <td>{{ $service->created_at->diffforhumans() }}</td>
                                                <td>
                                                    <a href="{{ route('admin.service.edit', ['id' => $service->id]) }}"
                                                        id="{{ $service->id }}"
                                                        class="btn btnEditCar btn-sm btn-s rounded-pill btn-icon btn-outline-info">
                                                        <span class="tf-icons bx bx-edit"></span>
                                                    </a>
                                                    <a href="" id="{{ $service->id }}"
                                                        class="btn btnDeleteCar btn-sm btn-s rounded-pill btn-icon btn-outline-danger">
                                                        <span class="tf-icons fa-solid fa-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="card-footer">
                            {{ $services->links('pagination::bootstrap-4') }}

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
    @if (session('success'))
        <script>
            toastr.success('{{ session('+success+') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('+error+') }}');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.btnDeleteCar', function(e) {
                e.preventDefault();
                var id = this.id;  

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: `/admin/service/destroy/${id}`,  
                            dataType: "JSON",
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.success,
                                    'success'
                                );
                                $("#CarTable").load(location.href + " #CarTable");
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection

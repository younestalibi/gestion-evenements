@extends('layouts.container')

@section('title')
    All Messages
@endsection

@section('m-content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1">
            <div class="row">
                <div class="col-md-12">
                    <!-- All Messages -->
                    <div class="card">
                    <h5 class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                All Messages
                                
                            </div>
                        </h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped" id="CarTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full-Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Event</th>
                                        <th>Message</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if (count($messages) > 0)
                                    <tbody class="table-border-bottom-0">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($messages as $message)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->phone }}</td>
                                                <td>{{ $message->email  }}</td>
                                                <td>
                                                    <a href="{{ route('home.event.show',['event'=>$message->event->id]) }} ">{{ $message->event->name  }}</a>
                                                </td>
                                                <td>{{$message->message}}</td>
                                                <td>{{ $message->created_at->diffforhumans() }}</td>
                                                <td>
                                              
                                                    <a href="" id="{{ $message->id }}"
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
                            {{ $messages->links('pagination::bootstrap-4') }}

                        </div>
                    </div>
                    <!-- All Messages -->
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
                            url: `/admin/message/destroy/${id}`,  
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

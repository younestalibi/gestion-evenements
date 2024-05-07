@extends('layouts.container')

@section('title')
    All Suggestions
@endsection

@section('m-content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1">
            <div class="row">
                <div class="col-md-12">
                    <!-- All Suggestions -->
                    <div class="card">
                        <h5 class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                All Suggestions
                                <a href="{{ route('admin.suggestion.create') }}" class="btn btn-info">
                                    New Suggestion &nbsp; <span class="tf-icons fa-solid fa-angles-right"></span>
                                </a>
                            </div>
                        </h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped" id="SuggestionTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @if (count($suggestions) > 0)
                                    <tbody class="table-border-bottom-0">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($suggestions as $suggestion)
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $suggestion->name }}</td>
                                                <td>{{ Str::limit($suggestion->description, 50, '...') }}</td>
                                                <td class="col-2">
                                                    <img class="img-fluid" src="{{ asset('users/suggestions/' . $suggestion->image) }}" />
                                                </td>
                                                <td>{{ $suggestion->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('admin.suggestion.edit', ['suggestion' => $suggestion->id]) }}" id="{{ $suggestion->id }}" class="btn btnEditSuggestion btn-sm btn-s rounded-pill btn-icon btn-outline-info">
                                                        <span class="tf-icons bx bx-edit"></span>
                                                    </a>
                                                    <a href="" id="{{ $suggestion->id }}" class="btn btnDeleteSuggestion btn-sm btn-s rounded-pill btn-icon btn-outline-danger">
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
                            {{ $suggestions->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    <!-- All Suggestions -->
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
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('click', '.btnDeleteSuggestion', function(e) {
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
                            url: `/admin/suggestion/destroy/${id}`,  
                            dataType: "JSON",
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.success,
                                    'success'
                                );
                                $("#SuggestionTable").load(location.href + " #SuggestionTable");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection

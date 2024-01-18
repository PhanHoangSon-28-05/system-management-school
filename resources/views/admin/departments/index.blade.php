@extends('admin.layouts.app')
@section('title', 'departments')
@section('content')
    <div class="right_col" department="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Departments</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            @can('create-department')
                                <a type="button" href="{{ URL::route('departments.create') }}" class="btn btn-secondary">
                                    Create
                                </a>
                            @endcan
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <span class="text-muted font-13 m-b-30">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </span>
                                    <table id="datatable-keytable" class="table table-striped table-bordered"
                                        style="width:100%,">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Descripton</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($departments as $department)
                                                <tr>
                                                    <td>{{ $department->id }}</td>
                                                    <td>{{ $department->name }}</td>
                                                    <td>{{ $department->description }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('show-department')
                                                                <a class="btn btn-success btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ route('departments.show', $department->slug) }}"><i
                                                                        class="fas fa-eye"></i> View</a>
                                                            @endcan
                                                            @can('update-department')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ route('departments.edit', $department->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-department')
                                                                <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-department"
                                                                    data-department-id="{{ $department->id }}"
                                                                    data-department-name="{{ $department->name }}"
                                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                                                        class="fas fa-trash-alt"></i>
                                                                    Delete</a>
                                                            @endcan
                                                        </div>
                                                        <div class="modal fade" id="staticBackdrop"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">Modal
                                                                            title</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3>Are you sure you want to delete department with
                                                                            name
                                                                            <span id="department-id-placeholder"></span>?
                                                                        </h3>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary"
                                                                            id="delete-modal-btn">Delete</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{-- @endif --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-department').on('click', function() {
                var departmentName = $(this).data('department-name');
                $('#department-id-placeholder').text(departmentName);

                var departmentId = $(this).data('department-id');

                // Set data attribute for the delete link
                $('#delete-modal-btn').data('department-id', departmentId);
            });

            $('#staticBackdrop').on('shown.bs.modal', function() {
                $('#delete-modal-btn').on('click', function() {
                    var departmentId = $('#delete-modal-btn').data('department-id');

                    // Perform AJAX request to delete the department
                    $.ajax({
                        url: '{{ url('admin/departments') }}/' + departmentId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(error) {
                            // Handle error, e.g., display an error message
                            console.error(error);
                        }
                    });
                });
            });
        });
    </script>
@endsection

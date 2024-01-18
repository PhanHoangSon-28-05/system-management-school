@extends('admin.layouts.app')
@section('title', 'Teacher')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('message'))
                    <div>{{ session('message') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>Teachers</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            @can('create-teacher')
                                <a type="button" href="{{ URL::route('teachers.create') }}" class="btn btn-secondary">
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
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Teacher Code</th>
                                                <th>Teacher Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $teacher)
                                                <tr>
                                                    <td>{{ $teacher->id }}</td>
                                                    <td>{{ $teacher->code }}</td>
                                                    <td>{{ $teacher->last_name . ' ' . $teacher->first_name }}</td>
                                                    <td>{{ $teacher->email }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('show-teacher')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ URL::route('teachers.show', $teacher->id) }}"><i
                                                                        class="fas fa-eye"></i> View</a>
                                                            @endcan
                                                            @can('update-teacher')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ URL::route('teachers.edit', $teacher->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-teacher')
                                                                <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-teacher"
                                                                    data-teacher-id="{{ $teacher->id }}"
                                                                    data-teacher-name="{{ $teacher->last_name . ' ' . $teacher->first_name }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteTeacherModal{{ $teacher->id }}">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        <div class="modal fade" id="deleteTeacherModal{{ $teacher->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="deleteTeacherModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="deleteTeacherModalLabel">Delete Teacher</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete teacher with name
                                                                            <strong>{{ $teacher->last_name . ' ' . $teacher->first_name }}</strong>?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary delete-modal-btn"
                                                                            data-teacher-id="{{ $teacher->id }}">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.delete-teacher').on('click', function() {
            var teacherName = $(this).data('teacher-name');
            $('#teacher-id-placeholder').text(teacherName);

            var teacherId = $(this).data('teacher-id');

            // Set data attribute for the delete link
            $('#delete-modal-btn').data('teacher-id', teacherId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var teacherId = $(this).data('teacher-id');

            // Perform AJAX request to delete the teacher
            $.ajax({
                url: '{{ url('admin/teachers') }}/' + teacherId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>

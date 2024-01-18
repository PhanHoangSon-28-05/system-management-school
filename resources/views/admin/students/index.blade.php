@extends('admin.layouts.app')
@section('title', 'Students')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Students</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            @can('create-student')
                                <a type="button" href="{{ URL::route('students.create') }}" class="btn btn-secondary">
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
                                                <th>Student Code</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $student->code }}</td>
                                                    <td>{{ $student->last_name . ' ' . $student->first_name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('show-student')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ URL::route('students.show', $student->id) }}"><i
                                                                        class="fas fa-eye"></i> View</a>
                                                            @endcan
                                                            @can('update-student')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ URL::route('students.edit', $student->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-student')
                                                                <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-student"
                                                                    data-student-id="{{ $student->id }}"
                                                                    data-student-name="{{ $student->last_name . ' ' . $student->first_name }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteStudentModal{{ $student->id }}">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        <div class="modal fade" id="deleteStudentModal{{ $student->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="deleteStudentModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="deleteStudentModalLabel">Delete Student</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete student with name
                                                                            <strong>{{ $student->last_name . ' ' . $student->first_name }}</strong>?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary delete-modal-btn"
                                                                            data-student-id="{{ $student->id }}">Delete</button>
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
        $('.delete-student').on('click', function() {
            var studentName = $(this).data('student-name');
            $('#student-id-placeholder').text(studentName);

            var studentId = $(this).data('student-id');

            // Set data attribute for the delete link
            $('#delete-modal-btn').data('student-id', studentId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var studentId = $(this).data('student-id');

            // Perform AJAX request to delete the student
            $.ajax({
                url: '{{ url('admin/students') }}/' + studentId,
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

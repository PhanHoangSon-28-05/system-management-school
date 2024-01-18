@extends('admin.layouts.app')
@section('title', 'Subjects')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Subjects</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            @can('create-subject')
                                <a type="button" href="{{ URL::route('subjects.create') }}" class="btn btn-secondary">
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
                                                <th>Subject Name</th>
                                                <th class="text-center">Credit hours</th>
                                                <th class="text-center">Total number of periods</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td class="text-center">{{ $subject->credit_hours }}</td>
                                                    <td class="text-center">{{ $subject->total_number_of_periods }}</td>
                                                    <td>{{ $subject->description }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update-subject')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                    href="{{ route('subjects.edit', $subject->id) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-subject')
                                                                <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-subject"
                                                                    data-subject-id="{{ $subject->id }}"
                                                                    data-subject-name="{{ $subject->name }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#deleteSubjectModal{{ $subject->id }}"><i
                                                                        class="fas fa-trash-alt"></i>
                                                                    Delete</a>
                                                            @endcan
                                                        </div>
                                                        <div class="modal fade" id="deleteSubjectModal{{ $subject->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="deleteSubjectModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="deleteSubjectModalLabel">Delete Subject</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete subject with name
                                                                            <strong>{{ $subject->name }}</strong>?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary delete-modal-btn"
                                                                            data-subject-id="{{ $subject->id }}">Delete</button>
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
        $('.delete-subject').on('click', function() {
            var subjectName = $(this).data('subject-name');
            var subjectId = $(this).data('subject-id');
            $('#subject-id-placeholder').text(subjectName);

            // Set data attribute for the delete link
            $('#delete-modal-btn').data('subject-id', subjectId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var subjectId = $(this).data('subject-id');

            // Perform AJAX request to delete the subject
            $.ajax({
                url: '{{ url('admin/subjects') }}/' + subjectId,
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

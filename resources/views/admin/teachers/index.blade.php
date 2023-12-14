@extends('admin.layouts.app')
@section('title', 'Teacher')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            @if (session('massage'))
            <div>{{ session('massage') }}</div>
            @endif
            <div class="">
                <div class="x_title">
                    <h2>KeyTable example Teacher</h2>

                    <ul class="nav navbar-right panel_toolbox">
                        <a type="button" href="" class="btn btn-secondary">
                            Create
                        </a>
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
                                <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
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
                                            <td>{{ $teacher->name }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 " href=""><i class="fas fa-eye"></i> View</a>
                                                    <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 " href=""><i class="fas fa-edit"></i> Edit</a>
                                                    <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-role" data-role-id=""><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-teacher').click(function(e) {
            e.preventDefault();

            var teacherID = $(this).data('teacher-id');
            if (confirm('Are you sure you want to delete teacher with ID ' + teacherID + '?')) {
                $.ajax({
                    url: '/admin/teachers/' + teacherID,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
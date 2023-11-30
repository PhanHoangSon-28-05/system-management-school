@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('message'))
                    <div>{{ session('message') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>Roles</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('roles.create') }}" class="btn btn-secondary">
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
                                    <table id="datatable-keytable" class="table table-striped table-bordered"
                                        style="width:100%,">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Position</th>
                                                <th>Group</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                {{-- @if ($role->name == 'super-admin')
                                                @else --}}
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->group }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                href="{{ route('roles.edit', $role->id) }}"><i
                                                                    class="fas fa-edit"></i> Edit</a>

                                                            <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-role"
                                                                data-role-id="{{ $role->id }}"><i
                                                                    class="fas fa-trash-alt"></i>
                                                                Delete</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-role').click(function(e) {
            e.preventDefault();

            var roleId = $(this).data('role-id');
            if (confirm('Are you sure you want to delete role with ID ' + roleId + '?')) {
                $.ajax({
                    url: '/admin/roles/' + roleId,
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

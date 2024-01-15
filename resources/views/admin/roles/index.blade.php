@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
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
                                        style="width:100%">
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
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td>{{ $role->group }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                href="{{ route('roles.edit', $role->id) }}">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>

                                                            <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-role"
                                                                data-role-id="{{ $role->id }}"
                                                                data-role-name="{{ $role->display_name }}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop{{ $role->id }}">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </a>
                                                        </div>
                                                        <div class="modal fade" id="staticBackdrop{{ $role->id }}"
                                                            data-bs-backdrop="static" data-bs-keyboard="false"
                                                            tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="staticBackdropLabel">Modal title</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3>Are you sure you want to delete role with name
                                                                            <span
                                                                                id="role-id-placeholder{{ $role->id }}"></span>?
                                                                        </h3>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary delete-modal-btn"
                                                                            data-role-id="{{ $role->id }}">Delete</button>
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
        $('.delete-role').on('click', function() {
            var roleName = $(this).data('role-name');
            var roleId = $(this).data('role-id');

            $('#role-id-placeholder' + roleId).text(roleName);
            $('.delete-modal-btn').data('role-id', roleId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var roleId = $(this).data('role-id');

            $.ajax({
                url: '{{ url('admin/roles') }}/' + roleId,
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

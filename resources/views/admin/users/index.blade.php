@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('message'))
                    <div>{{ session('message') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example Users</h2>
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
                                                <th>Account Name</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @if ($user->username != 'super-admin')
                                                                @can('update-user')
                                                                    <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3"
                                                                        href="{{ route('users.edit', $user->id) }}"><i
                                                                            class="fas fa-edit"></i> Edit</a>
                                                                @endcan
                                                                @can('delete-user')
                                                                    <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-user"
                                                                        data-user-id="{{ $user->id }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteUserModal{{ $user->id }}"><i
                                                                            class="fas fa-trash-alt"></i>
                                                                        Delete</a>
                                                                @endcan
                                                                <div class="modal fade"
                                                                    id="deleteUserModal{{ $user->id }}"
                                                                    data-bs-backdrop="static" data-bs-keyboard="false"
                                                                    tabindex="-1" aria-labelledby="deleteUserModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="deleteUserModalLabel">Delete User
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete user with
                                                                                    ID
                                                                                    <strong>{{ $user->id }}</strong>?
                                                                                </p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="button"
                                                                                    class="btn btn-danger delete-modal-btn"
                                                                                    data-user-id="{{ $user->id }}">Delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
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
    $(document).ready(function() {
        $('.delete-user').click(function(e) {
            e.preventDefault();

            var userId = $(this).data('user-id');
            $('#deleteUserModal' + userId).modal('show');
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var userId = $(this).data('user-id');

            $.ajax({
                url: '/admin/users/' + userId,
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
        });
    });
</script>

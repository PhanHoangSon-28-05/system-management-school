@extends('admin.layouts.app')
@section('title', 'Rooms')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Rooms</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('rooms.create') }}" class="btn btn-secondary">
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
                                                <th>Name</th>
                                                <th>Descripton</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rooms as $room)
                                                <tr>
                                                    <td>{{ $room->id }}</td>
                                                    <td>{{ $room->name }}</td>
                                                    <td>{{ $room->description }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                href="{{ route('rooms.edit', $room->id) }}"><i
                                                                    class="fas fa-edit"></i> Edit</a>

                                                            <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-room"
                                                                data-room-id="{{ $room->id }}"
                                                                data-room-name="{{ $room->name }}" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop{{ $room->id }}"><i
                                                                    class="fas fa-trash-alt"></i> Delete</a>
                                                        </div>
                                                        <div class="modal fade" id="staticBackdrop{{ $room->id }}"
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
                                                                        <h3>Are you sure you want to delete room with name
                                                                            <span id="room-id-placeholder"></span>?
                                                                        </h3>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary delete-modal-btn">Delete</button>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.delete-room').on('click', function() {
            var roomName = $(this).data('room-name');
            $('#room-id-placeholder').text(roomName);

            var roomId = $(this).data('room-id');

            // Set data attribute for the delete link
            $('.delete-modal-btn').data('room-id', roomId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var roomId = $(this).data('room-id');

            // Perform AJAX request to delete the room
            $.ajax({
                url: '{{ url('admin/rooms') }}/' + roomId,
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
</script>

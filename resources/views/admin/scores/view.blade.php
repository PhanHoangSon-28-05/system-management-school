@extends('admin.layouts.app')
@section('title', 'View Score Student')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>View Score Student</h2>
                        <div class="clearfix"></div>
                        <a href="{{ URL::route('scores.show', $slugGrade) }}" type="button" href=""
                            class="btn btn-secondary">
                            <i class="fas fa-backward"></i>
                        </a>
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
                                                <th>Attendance</th>
                                                <th>Score coefficient 2 times 1</th>
                                                <th>Score coefficient 2 times 2</th>
                                                <th>Final score</th>
                                                <th>Medium score</th>
                                                <th>Scale 4</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($scores as $score)
                                                <tr>
                                                    <td>{{ $score->id }}</td>
                                                    <td>{{ $score->subjects->name }}</td>
                                                    <td>{{ $score->detail_scores->attendance }}</td>
                                                    <td>{{ $score->detail_scores->scores_2_1 }}</td>
                                                    <td>{{ $score->detail_scores->scores_2_2 }}</td>
                                                    <td>{{ $score->detail_scores->final_score }}</td>
                                                    <td>{{ $score->detail_scores->medium_score }}</td>
                                                    <td>{{ $score->detail_scores->scale_4 }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('update-score')
                                                                <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-2 pe-2 rounded-3 "
                                                                    href="{{ route('scores.editScore', [$slugGrade, $slugStudent, $score->id]) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('delete-score')
                                                                <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-2 pe-2 rounded-3 delete-score"
                                                                    data-score-id="{{ $score->id }}"
                                                                    data-score-name="{{ $score->subjects->name }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop{{ $score->id }}"><i
                                                                        class="fas fa-trash-alt"></i> Delete</a>
                                                            @endcan
                                                        </div>
                                                        <div class="modal fade" id="staticBackdrop{{ $score->id }}"
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
                                                                        <h3>Are you sure you want to delete score with name
                                                                            <span id="score-id-placeholder"></span>?
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
        $('.delete-score').on('click', function() {
            var scoreName = $(this).data('score-name');
            $('#score-id-placeholder').text(scoreName);

            var scoreId = $(this).data('score-id');

            // Set data attribute for the delete link
            $('.delete-modal-btn').data('score-id', scoreId);
        });

        $('body').on('click', '.delete-modal-btn', function() {
            var scoreId = $(this).data('score-id');

            // Perform AJAX request to delete the score
            $.ajax({
                url: '{{ url('admin/scores') }}/' + scoreId,
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

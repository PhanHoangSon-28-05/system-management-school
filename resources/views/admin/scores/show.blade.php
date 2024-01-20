@extends('admin.layouts.app')
@section('title', 'Grade')
@section('content')
    <div class="right_col" role="main">
        <h2 class="">
            Student
        </h2>
        <div>
            <div class="">
                <div class="student">
                    <div class="page-title">
                        <div class="title_left">
                            @can('create-score')
                                <a href="{{ route('scores.addScore', $slugGrade) }}" type="button" href=""
                                    class="btn btn-secondary">
                                    ADD
                                </a>
                            @endcan
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="search" id="filter" onkeyup="searchProduct()" class="form-control"
                                        placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12  text-center">
                                </div>
                                <div class="clearfix"></div>
                                <div id="card-list" class="row" style="margin:auto">
                                    <div class="col-md-12 col-sm-12  profile_details search text-center">
                                        <form action="ttm" method="post">
                                            {!! csrf_field() !!}
                                            @if ($teacherGrade)
                                                <div class="well profile_view">
                                                    <div class="col-sm-12">
                                                        <h4 class="brief"><i>{{ $teacherGrade->code }}</i>
                                                        </h4>
                                                        <div class="left col-md-8 col-sm-7">
                                                            <h2>{{ $teacherGrade->last_name . ' ' . $teacherGrade->first_name }}
                                                            </h2>
                                                            <p><strong>Emai: </strong>
                                                                {{ $teacherGrade->email }}
                                                            </p>
                                                            <ul class="list-unstyled">
                                                                <li><i class="fa fa-building"></i> Address:
                                                                    {{ $teacherGrade->hometown }}</li>
                                                                <li><i class="fa fa-phone"></i> Phone #:
                                                                    {{ $teacherGrade->phone }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="right col-md-4 col-sm-5 w-25">
                                                            <img src="{{ asset('public/uploads/teachers/individual/' . $teacherGrade->image_personal) }}"
                                                                alt="" class="img-circle img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class=" profile-bottom">
                                                        <div class=" col-sm-7 emphasis">
                                                        </div>
                                                        <div class=" col-sm-5 emphasis">
                                                            <a href="" class="btn btn-primary btn-xs rounded-3">
                                                                <i class="fa fa-user"> </i> View Profile
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                    @foreach ($studentgrades as $studentgrade)
                                        <div class="col-md-4 col-sm-4  profile_details search">
                                            <form action="ttm" method="post">
                                                {!! csrf_field() !!}
                                                <div class="well profile_view">
                                                    <div class="col-sm-12">
                                                        <h4 class="brief"><i>{{ $studentgrade->code }}</i>
                                                        </h4>
                                                        <div class="left col-md-7 col-sm-7">
                                                            <h2>{{ $studentgrade->last_name . ' ' . $studentgrade->first_name }}
                                                            </h2>
                                                            <p><strong>Emai: </strong>
                                                                {{ $studentgrade->email }}
                                                            </p>
                                                            <ul class="list-unstyled">
                                                                <li><i class="fa fa-building"></i> Address:
                                                                    {{ $studentgrade->hometown }}
                                                                </li>
                                                                <li><i class="fa fa-phone"></i> Phone #:
                                                                    {{ $studentgrade->phone }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="right col-md-5 col-sm-5 text-center">
                                                            <img src="{{ asset('public/uploads/students/individual/' . $studentgrade->image_personal) }}"
                                                                alt="" class="img-circle img-fluid w25">
                                                        </div>
                                                    </div>
                                                    <div class=" profile-bottom text-center">
                                                        <div class=" col-sm-6 emphasis">
                                                        </div>
                                                        <div class=" col-sm-6 emphasis">
                                                            @can('show-score')
                                                                <a class="btn btn-info btn-xs rounded-3 "
                                                                    href="{{ route('scores.viewScore', [$slugGrade, $studentgrade->slug]) }}"><i
                                                                        class="fas fa-edit"></i> Edit</a>
                                                            @endcan
                                                            @can('show-student')
                                                                <a href="{{ URL::route('students.show', $studentgrade->id) }}"
                                                                    class="btn btn-primary btn-xs rounded-3">
                                                                    <i class="fa fa-user"> </i> View Profile
                                                                </a>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
        $('.delete-grade').on('click', function() {
            var gradeName = $(this).data('grade-name');
            $('#grade-id-placeholder').text(gradeName);

            var gradeId = $(this).data('grade-id');

            // Set data attribute for the delete link
            $('#delete-modal-btn').data('grade-id', gradeId);
        });

        $('#staticBackdrop').on('shown.bs.modal', function() {
            $('#delete-modal-btn').on('click', function() {
                var gradeId = $('#delete-modal-btn').data('grade-id');

                // Perform AJAX request to delete the grade
                $.ajax({
                    url: '{{ url('admin/grades') }}/' + gradeId,
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
@section('scripts')
    <script>
        function searchProduct() {
            const input = document.getElementById('filter').value.toUpperCase();

            const cardContainer = document.getElementById('card-list');
            console.log(cardContainer);

            const cards = cardContainer.getElementsByClassName('profile_details');
            console.log(cards);

            for (let i = 0; i < cards.length; i++) {
                let title = cards[i].querySelector(".search h2");

                console.log(title);

                if (title.innerText.toUpperCase().indexOf(input) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
@endsection

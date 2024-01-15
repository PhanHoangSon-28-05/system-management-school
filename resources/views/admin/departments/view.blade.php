@extends('admin.layouts.app')
@section('title', 'Department')
@section('content')
    <div class="right_col" role="main">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Teacher
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="teacher">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Contacts Design</h3>
                                    <a type="button"
                                        href="{{ URL::route('departments.teachers-departmentadd-teacher-deptement') }}"
                                        class="btn btn-secondary">
                                        ADD
                                    </a>
                                </div>

                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                        <div class="input-group">
                                            <input type="search"id="filter" onkeyup="searchProduct()" class="form-control"
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
                                            @foreach ($teacherDepartments as $teacherDepartment)
                                                <div class="col-md-4 col-sm-4  profile_details search">
                                                    <form action="ttm" method="post">
                                                        {!! csrf_field() !!}
                                                        <div class="well profile_view">
                                                            <div class="col-sm-12">
                                                                <h4 class="brief"><i>{{ $teacherDepartment->code }}</i>
                                                                </h4>
                                                                <div class="left col-md-7 col-sm-7">
                                                                    <h2>{{ $teacherDepartment->last_name . ' ' . $teacherDepartment->first_name }}
                                                                    </h2>
                                                                    <p><strong>Emai: </strong>
                                                                        {{ $teacherDepartment->email }}
                                                                    </p>
                                                                    <ul class="list-unstyled">
                                                                        <li><i class="fa fa-building"></i> Address:
                                                                            {{ $teacherDepartment->hometown }}</li>
                                                                        <li><i class="fa fa-phone"></i> Phone #:
                                                                            {{ $teacherDepartment->phone }}</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="right col-md-5 col-sm-5 text-center">
                                                                    <img src="{{ asset('public/uploads/teachers/individual/' . $teacherDepartment->image_personal) }}"
                                                                        alt="" class="img-circle img-fluid w25">
                                                                </div>
                                                            </div>
                                                            <div class=" profile-bottom text-center">
                                                                <div class=" col-sm-6 emphasis">
                                                                </div>
                                                                <div class=" col-sm-6 emphasis">
                                                                    <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                        href="{{ route('departments.teachers-departmentedit', [$slugDepartment, $teacherDepartment->id]) }}"><i
                                                                            class="fas fa-edit"></i> Edit</a>
                                                                    <a href="{{ URL::route('teachers.show', $teacherDepartment->id) }}"
                                                                        class="btn btn-primary btn-xs rounded-3">
                                                                        <i class="fa fa-user"> </i> View Profile
                                                                    </a>
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
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Grade
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="grade">
                            <div class="page-title">
                                <div class="title_left">
                                    <h3>Contacts Design</h3>
                                    <a type="button"
                                        href="{{ URL::route('departments.grades-departmentadd-grade-deptement') }}"
                                        class="btn btn-secondary">
                                        ADD
                                    </a>
                                </div>

                                <div class="title_right">
                                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                        <div class="input-group">
                                            <input type="search"id="filter" onkeyup="searchProduct()" class="form-control"
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
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($gradeDepartments as $gradeDepartment)
                                                            {{-- @if ($gradeDepartment->name == 'super-admin')
                                                            @else --}}
                                                            <tr>
                                                                <td>{{ $gradeDepartment->id }}</td>
                                                                <td>{{ $gradeDepartment->name }}</td>
                                                                <td>{{ $gradeDepartment->description }}</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                                                            href="{{ route('departments.grades-departmentedit', [$slugDepartment, $gradeDepartment->id]) }}"><i
                                                                                class="fas fa-edit"></i> Edit</a>

                                                                        <a class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 delete-gradeDepartment"
                                                                            data-gradeDepartment-id="{{ $gradeDepartment->id }}"
                                                                            data-gradeDepartment-name="{{ $gradeDepartment->name }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"><i
                                                                                class="fas fa-trash-alt"></i>
                                                                            Delete</a>
                                                                    </div>
                                                                    <div class="modal fade" id="staticBackdrop"
                                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                                        tabindex="-1"
                                                                        aria-labelledby="staticBackdropLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5"
                                                                                        id="staticBackdropLabel">Modal
                                                                                        title</h1>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <h3>Are you sure you want to delete
                                                                                        gradeDepartment with name
                                                                                        <span
                                                                                            id="gradeDepartment-id-placeholder"></span>?
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-primary"
                                                                                        id="delete-modal-btn">Delete</button>

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
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

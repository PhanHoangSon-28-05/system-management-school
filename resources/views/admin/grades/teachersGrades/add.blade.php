@extends('admin.layouts.app')
@section('title', 'Create Grades Teacher')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Grade Teacher</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('grades.teachers-gradestore') }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectOption" name="grade_id"
                                                aria-label="Floating label select example" onchange="checkGradeStatus()">
                                                <option>Select teacher:</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">
                                                        {{ $teacher->last_name . ' ' . $teacher->first_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Name tracher</label>
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectGrade" name="grade_id"
                                                aria-label="Floating label select example"">
                                                <option>Select grade:</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">
                                                        {{ $grade->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Name grade</label>
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group" id="radioGroupContainer">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <h4 for="">Name position: </h4>
                                            <div class="form-check form-check-inline" id="homeroomTeacherOption"
                                                style="display: block;">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="flexRadioDefault1" value="1">
                                                <label class="form-check-label" for="flexRadioDefault1">Homeroom
                                                    teacher</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="flexRadioDefault2" value="2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">Subject
                                                    teacher</label>
                                            </div>
                                        </div>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>


                                <br />
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">ADD</button>
                                </div>
                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="x_panel">
                        <div class="x_content" id="selectedInfo">
                            @foreach ($teachers as $teacher)
                                <div class="teacher-info-container" id="{{ $teacher->id }}" style="display: none;">
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="{{ asset('public/uploads/teachers/individual/' . $teacher->image_personal) }}"
                                            alt="" class="img-circle img-fluid w-75">
                                    </div>
                                    <div class="teacher-details mt-3">
                                        <ul>
                                            <li class="fs-5">
                                                <span class="label">Name:</span>
                                                {{ $teacher->last_name . ' ' . $teacher->first_name }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">teacher Code:</span>
                                                {{ $teacher->code }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Gender:</span>
                                                {{ $teacher->gender }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Birthday:</span>
                                                {{ $teacher->birthday }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Hometown:</span>
                                                {{ $teacher->hometown }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Phone:</span>
                                                {{ $teacher->phone }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Email:</span>
                                                {{ $teacher->email }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('selectOption').addEventListener('change', function() {
            var selectedOption = this.value;

            var teacherInfoContainers = document.querySelectorAll('.teacher-info-container');
            teacherInfoContainers.forEach(function(container) {
                container.style.display = 'none';
            });
            document.getElementById(selectedOption).style.display = 'block';

        });


        document.getElementById('selectGrade').addEventListener('change', function() {
            handleHomeroomTeacherOption(this.value);
        });

        function handleHomeroomTeacherOption(gradeId) {
            var teacherInfoContainers = document.querySelectorAll('.teacher-info-container');
            teacherInfoContainers.forEach(function(container) {
                container.style.display = 'block';
            });

            var homeroomTeacherOption = document.getElementById('homeroomTeacherOption');
            homeroomTeacherOption.style.display = 'none'; // Display by default

            $.ajax({
                url: '{{ route('grades.teachers-gradecheckStatus', ['gradeId' => 'gradeId']) }}',
                type: 'GET',
                data: {
                    gradeId: gradeId,
                },
                success: function(data) {

                    if (data.check === true) {
                        homeroomTeacherOption.style.display = 'none'; // Hide if check is true
                    }
                },
                error: function(error) {
                    console.error('Error fetching periods:', error);
                }
            });
        }
    </script>

@endsection

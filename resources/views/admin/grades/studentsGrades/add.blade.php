@extends('admin.layouts.app')
@section('title', 'Create Grades Student')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Grade Student</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('grades.students-gradestore') }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectOption" name="student_id"
                                                aria-label="Floating label select example">
                                                <option>Select student:</option>
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">
                                                        {{ $student->last_name . ' ' . $student->first_name }}</option>
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
                                            <select class="form-select" id="selectOption" name="grade_id"
                                                aria-label="Floating label select example">
                                                <option>Select departement:</option>
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
                            @foreach ($students as $student)
                                <div class="student-info-container" id="{{ $student->id }}" style="display: none;">
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="{{ asset('public/uploads/students/individual/' . $student->image_personal) }}"
                                            alt="" class="img-circle img-fluid w-75">
                                    </div>
                                    <div class="student-details mt-3">
                                        <ul>
                                            <li class="fs-5">
                                                <span class="label">Name:</span>
                                                {{ $student->last_name . ' ' . $student->first_name }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">student Code:</span>
                                                {{ $student->code }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Gender:</span>
                                                {{ $student->gender }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Birthday:</span>
                                                {{ $student->birthday }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Hometown:</span>
                                                {{ $student->hometown }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Phone:</span>
                                                {{ $student->phone }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Email:</span>
                                                {{ $student->email }}
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
        // Add event listener to the select element
        document.getElementById('selectOption').addEventListener('change', function() {
            // Get the selected option value
            var selectedOption = this.value;

            // Hide all student-info-container elements
            var studentInfoContainers = document.querySelectorAll('.student-info-container');
            studentInfoContainers.forEach(function(container) {
                container.style.display = 'none';
            });

            // Display the selected student-info-container
            document.getElementById(selectedOption).style.display = 'block';
        });
    </script>
@endsection

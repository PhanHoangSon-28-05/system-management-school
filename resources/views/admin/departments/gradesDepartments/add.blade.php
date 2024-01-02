@extends('admin.layouts.app')
@section('title', 'Create Departments Grade')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Department Grade</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('departments.grades-departmentstore') }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectOption" name="grade_id"
                                                aria-label="Floating label select example">
                                                <option>Select Grade:</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">
                                                        {{ $grade->name }}</option>
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
                                            <select class="form-select" id="selectOption" name="department_id"
                                                aria-label="Floating label select example">
                                                <option>Select departement:</option>
                                                @foreach ($departements as $departement)
                                                    <option value="{{ $departement->id }}">
                                                        {{ $departement->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Name departement</label>
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
                            @foreach ($grades as $grade)
                                <div class="grade-info-container" id="{{ $grade->id }}" style="display: none;">
                                    <div class="grade-details mt-3">
                                        <ul>
                                            <li class="fs-5">
                                                <span class="label">ID:</span>
                                                {{ $grade->id }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Name:</span>
                                                {{ $grade->name }}
                                            </li>
                                            <li class="fs-5">
                                                <span class="label">Description:</span>
                                                {{ $grade->description }}
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

            // Hide all grade-info-container elements
            var gradeInfoContainers = document.querySelectorAll('.grade-info-container');
            gradeInfoContainers.forEach(function(container) {
                container.style.display = 'none';
            });

            // Display the selected grade-info-container
            document.getElementById(selectedOption).style.display = 'block';
        });
    </script>
@endsection

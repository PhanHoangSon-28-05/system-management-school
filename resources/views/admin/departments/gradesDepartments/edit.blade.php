@extends('admin.layouts.app')
@section('title', 'Edit Department Grades')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Department Grade</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('departments.grades-departmentupdate', $grade->id) }}"
                                id="demo-form" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" name="department_id"
                                                aria-label="Floating label select example">
                                                <option value="{{ $departement_selected->id }}">
                                                    {{ $departement_selected->name }}</option>
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
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="grade-info-container">

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

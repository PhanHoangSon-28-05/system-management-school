@extends('admin.layouts.app')
@section('title', 'Show teacher')
@section('content')
<div class="right_col" role="main">
    <div class="row">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_content">
                        <style>
                            .ul {
                                font-size: 25px;
                                list-style-type: none;
                            }

                            .li-newline {
                                clear: both;
                                margin-bottom: 10px;
                            }
                        </style>
                        <!-- start form for validation -->

                        <div class="">
                            <div style="margin-left: 25%;">
                                <div style="display: inline-block;">
                                    <img style="width: 20em; height: 20em; background: blue;" src="{{ URL::asset('admin/build/images/$teacher->image_personal') }}" alt="..." class="img-circle profile_img">
                                </div>
                            </div>
                            <div class="">

                                <ul class="ul">
                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px; display: flex;">
                                            <span style="flex: 1;">Full Name</span>
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->name}}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Teacher Code
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->code}}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Gender
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->gender }}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Birthday
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->birthday }}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Hometown
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->hometown }}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Phone
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->phone }}
                                        </div>
                                    </li>

                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Email
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            {{ $teacher->email }}
                                        </div>
                                    </li>
                                    <li class="li-newline" style="display: flex; align-items: center;">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fullname" style="font-weight: bold; font-size:25px;">
                                            Citizen identification image
                                            <span class="required" style="color: red;">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6" style="display: flex; align-items: center;">
                                            <div style="width: 20em; height: 10em; background-color: blue; display: flex; justify-content: center; align-items: center;">
                                                <img src="{{ URL::asset('admin/build/images/$teacher->image_citizenIdentification') }}" alt="Image" style="max-width: 100%; max-height: 100%;">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
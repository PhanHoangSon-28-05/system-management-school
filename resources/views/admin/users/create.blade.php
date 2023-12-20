@extends('admin.layouts.app')
@section('title', 'Create Users')
@section('content')
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: #555;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 1% 1%;
        font-size: 2em;
        width: 48%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: black;
        display: none;
        padding: 2% 2%;
        height: 100%;
    }
</style>
<div class="right_col" role="main">
    <div class="row">
        <button class="tablink" onclick="openPage('Teacher', this, 'green')" id="defaultOpen">Create Teacher</button>
        <button class="tablink" onclick="openPage('Student', this, 'green')">Create Student</button>
        <div id="Teacher" class="tabcontent">
            <form method="post" action="{{ route('teachers.store') }}" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                @csrf

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="fullname" style="font-weight: bold; font-size:15px;">Full Name
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" value="{{ old('fullname') }}" name="fullname" id="fullname" placeholder="Teacher name" required="required" />
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="email" style="font-weight: bold; font-size:15px;">Email <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" value="{{ old('email') }}" id="email" name="email" class='email' required="required" type="email" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="birthday" style="font-weight: bold; font-size:15px;">Birthday<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <div class="input-group date datepicker">
                            <input type="text" value="{{ old('birthday') }}" name="birthday" required='required' class="form-control" id="date" />
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        @error('birthday')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>

                <div class="col-5">

                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="password" style="font-weight: bold; font-size:15px;">Password
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" value="{{ old('password') }}" id="password1" name="password" required />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <span style="position: absolute; right:15px; top:7px; font-size:25px;" onclick="hideshow()">
                            <i id="slash" class="fa fa-eye-slash"></i>
                            <i id="eye" class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" style="font-weight: bold; font-size:15px;">Repeat password <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' />
                    </div>
                </div>

                <style>
                    .btn-coler.active {
                        background-color: #007bff;
                        color: #fff;
                    }

                    .btn-coler:not(.active) {
                        background-color: #ccc;
                        color: #000;
                    }
                </style>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; font-size:15px;">Gender <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="btn-group gender" data-toggle="buttons">
                            <label class="btn btn-coler" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male" class="join-btn">
                                &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-coler" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="fe-male" class="join-btn">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="phone" style="font-weight: bold; font-size:15px;">Telephone
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" value="{{ old('phone') }}" id="phone" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" />
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>



                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- create student -->
        <div id="Student" class="tabcontent">
            <form method="post" action="{{ route('users.store') }}" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                @csrf

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="fullname" style="font-weight: bold; font-size:15px;">Full Name
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" value="{{ old('fullname') }}" name="fullname" id="fullname" placeholder="Student name" required="required" />
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="email" style="font-weight: bold; font-size:15px;">Email <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" value="{{ old('email') }}" id="email" name="email" class='email' required="required" type="email" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="birthday" style="font-weight: bold; font-size:15px;">Birthday<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <div class="input-group date datepicker">
                            <input type="text" value="{{ old('birthday') }}" name="birthday" required='required' class="form-control" id="date" />
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        @error('birthday')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>
                <div class="col-5">

                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="password" style="font-weight: bold; font-size:15px;">Password
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" value="{{ old('password') }}" id="password1" name="password" required />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                        <span style="position: absolute; right:15px; top:7px; font-size:25px;" onclick="hideshow()">
                            <i id="slash" class="fa fa-eye-slash"></i>
                            <i id="eye" class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" style="font-weight: bold; font-size:15px;">Repeat password <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' />
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" style="font-weight: bold; font-size:15px;">Gender <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="btn-group gender" data-toggle="buttons">
                            <label class="btn btn-coler" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="male" class="join-btn">
                                &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-coler" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="gender" value="fe-male" class="join-btn">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="phone" style="font-weight: bold; font-size:15px;">Telephone
                        <span class="required" style="color: red;">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" type="text" value="{{ old('phone') }}" id="phone" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" />
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span><br>
                        @enderror
                    </div>
                </div>



                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ URL::asset('admin/vendors/validator/multifield.js') }}"></script>
<script src="{{ URL::asset('admin/vendors/validator/validator.js') }}"></script>
<!-- < !-- Javascript functions -->
<script>
    function hideshow() {
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if (password.type === 'password') {
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        } else {
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }

    /////
    function openPage(pageName, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
        var i,
            tabcontent,
            tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }


        // Remove the background color of all tablinks/buttons
        tablinks = document.getElementsByClassName("tablink");

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }

        // Show the specific tab content
        document.getElementById(pageName).style.display = "block";

        // Add the specific color to the button used to open the tab content
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.addEventListener("DOMContentLoaded", function() {
        openPage('Teacher', document.getElementById("defaultOpen"), 'green');
    });
</script>
@section('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function() {
        $('.datepicker').datepicker();
    });
</script>
@endsection
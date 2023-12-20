@extends('admin.layouts.app')
@section('title', 'Edit Teacher')
@section('content')

<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Teacher</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_content">

                        <!-- start form for validation -->
                        <form method="post" action="{{ route('teachers.update', $teacher->id) }}" id="demo-form" data-parsley-validate>
                            @csrf
                            @method('PUT')

                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="image_personal" style="font-weight: bold; font-size:15px;">Personal Image
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('image_personal') ?? $teacher->image_personal }}" name="image_personal" id="image_personal" type="file" required="required" accept="image/*" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="name" style="font-weight: bold; font-size:15px;">Name
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('name') ?? $teacher->name }}" name="name" id="name" type="text" placeholder="name-subject" required="required" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="birthday" style="font-weight: bold; font-size:15px;">Birthday
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group date datepicker">
                                        <input type="text" value="{{ old('birthday') ?? $teacher->birthday }}" name="birthday" required='required' class="form-control" id="date" />
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
                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="gender" style="font-weight: bold; font-size:15px;">Gender
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-coler {{ $teacher->gender == 'male' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" class="join-btn" {{ $teacher->gender == 'male' ? 'checked' : '' }}>
                                            &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-coler {{ $teacher->gender == 'female' ? 'active' : '' }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" class="join-btn" {{ $teacher->gender == 'female' ? 'checked' : '' }}>
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="email" style="font-weight: bold; font-size:15px;">Email
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('email') ?? $teacher->email }}" name="name" id="email" type="text" placeholder="name-subject" required="required" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="phone" style="font-weight: bold; font-size:15px;">Phone
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('phone') ?? $teacher->phone }}" name="phone" id="phone" type="text" placeholder="name-subject" required="required" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="hometown" style="font-weight: bold; font-size:15px;">Hometown
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('hometown') ?? $teacher->hometown }}" name="hometown" id="hometown" type="text" placeholder="name-subject" required="required" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="image_citizenIdentification" style="font-weight: bold; font-size:15px;">Citizen Identification Image
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('image_citizenIdentification') ?? $teacher->image_citizenIdentification }}" name="image_citizenIdentification" id="image_citizenIdentification" type="file" required="required" accept="image/*" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <br />
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
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
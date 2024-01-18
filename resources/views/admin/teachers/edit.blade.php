@extends('admin.layouts.app')
@section('title', 'Update Teacher')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Teacher</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('teachers.update', $teachers->id) }}" id="demo-form"
                                enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-3 label-align" for="inputimage_personal"
                                        style="font-weight: bold; font-size:15px;">Image Personal
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input type="file" name="image_personal" id="inputimage_personal"
                                            class="form-control @error('image_personal') is-invalid @enderror">
                                        @error('image_personal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if ($teachers->image_personal)
                                    <div class="field item form-group">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-4">
                                            <img src="{{ url('public/uploads/teachers/individual/' . $teachers->image_personal) }}"
                                                width="120px" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-3 label-align"
                                        for="inputimage_citizenIdentification"
                                        style="font-weight: bold; font-size:15px;">Image CitizenIdentification
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-3">
                                        <div class="col-md-6 col-sm-3">
                                            <label class="col-form-label label-align"
                                                for="image_citizenIdentification_front"
                                                style="font-weight: bold; font-size:15px;">Front</label>
                                            <input type="file" name="image_citizenIdentification_front"
                                                id="image_citizenIdentification_front"
                                                class="form-control @error('image_citizenIdentification_front') is-invalid @enderror">
                                            @error('image_citizenIdentification_front')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 col-sm-3">
                                            <label class="col-form-label label-align"
                                                for="image_citizenIdentification_front"
                                                style="font-weight: bold; font-size:15px;">Backside</label>
                                            <input type="file" name="image_citizenIdentification_backside"
                                                id="image_citizenIdentification_backside"
                                                class="form-control @error('image_citizenIdentification_backside') is-invalid @enderror">
                                            @error('image_citizenIdentification_backside')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 col-sm-3">
                                        <div class="col-md-6 col-sm-3">
                                            <img src="{{ url('public/uploads/teachers/citizenIdentification/' . $teachers->image_citizenIdentification_front) }}"
                                                width="120px" alt="">
                                        </div>
                                        <div class="col-md-6 col-sm-3">
                                            <img src="{{ url('public/uploads/teachers/citizenIdentification/' . $teachers->image_citizenIdentification_backside) }}"
                                                width="120px" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-3 label-align" for="last_name"
                                        style="font-weight: bold; font-size:15px;">Last Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-3">
                                        <div class="">
                                            <input class="form-control" data-validate-length-range="6"
                                                data-validate-words="2"
                                                value="{{ old('last_name') ?? $teachers->last_name }}" name="last_name"
                                                id="last_name" type="text" placeholder="Phan" required="required" />
                                            @error('last_name')
                                                <span class="text-danger">{{ $massage }}</span><br>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label col-sm-3 label-align" for="first_name"
                                            style="font-weight: bold; font-size:15px;">First Name
                                            <span class="required" style="color: red;">*</span></label>
                                        <div class="col-md-9 col-sm-6">
                                            <input class="form-control" data-validate-length-range="6"
                                                data-validate-words="2"
                                                value="{{ old('first_name') ?? $teachers->first_name }}" name="first_name"
                                                id="first_name" type="text" placeholder="Hoàng Sơn"
                                                required="required" />
                                            @error('first_name')
                                                <span class="text-danger">{{ $massage }}</span><br>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="birthday"
                                        style="font-weight: bold; font-size:15px;">Birthday<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" value="{{ old('birthday') ?? $teachers->birthday }}"
                                                name="birthday" required='required' class="form-control"
                                                id="date" />
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

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        style="font-weight: bold; font-size:15px;">Gender <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                                data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="male" class="join-btn"
                                                    {{ $teachers->gender == 'male' ? 'checked' : '' }}>
                                                &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-primary ms-2" data-toggle-class="btn-primary"
                                                data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="fe-male" class="join-btn"
                                                    {{ $teachers->gender == 'fe-male' ? 'checked' : '' }}>
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="email"
                                        style="font-weight: bold; font-size:15px;">Email <span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" type="text"
                                            value="{{ old('email') ?? $teachers->email }}" id="email" name="email"
                                            class='email' required="required" type="email" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"for="phone"
                                        style="font-weight: bold; font-size:15px;">Telephone
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control"
                                            type="text"value="{{ old('phone') ?? $teachers->phone }}" id="phone"
                                            type="tel" class='tel' name="phone" required='required'
                                            data-validate-length-range="8,20" />
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="hometown"
                                        style="font-weight: bold; font-size:15px;">Home Town <span
                                            class="required">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" type="text"
                                            value="{{ old('hometown') ?? $teachers->hometown }}" id="hometown"
                                            name="hometown" class='hometown' required="required" type="hometown" />
                                        @error('hometown')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <br />
                                <div class="text-center">
                                    @can('update-teacher')
                                        <button type="submit " class="btn btn-primary">ADD</button>
                                    @endcan
                                </div>
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

<!-- Javascript functions	-->
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
            $('#datepicker').datepicker();
        });
    </script>
@endsection

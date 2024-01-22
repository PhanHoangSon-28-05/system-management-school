@extends('admin.layouts.app')
@section('title', 'Edit Uses')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Uses</h3>
                </div>
            </div>
            <div class="clearfix">
                <a href="{{ URL::route('users.index') }}" type="button" href="" class="btn btn-secondary">
                    <i class="fas fa-backward"></i>
                </a>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">
                            <form method="post" enctype="multipart/form-data"
                                action="{{ route('users.update', $user->id) }}" id="demo-form" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="username"
                                        style="font-weight: bold; font-size:15px;">Username <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" value="{{ $user->username }}"
                                            id="username" name="username" class='username' required="required"
                                            type="username" readonly />
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                @hasrole('super-admin')
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"for="password"
                                            style="font-weight: bold; font-size:15px;">Password
                                            <span class="required" style="color: red;">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="password" value="xyz@1234" id="password1"
                                                name="password" required />
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                            <span style="position: absolute; right:15px; top:7px; font-size:25px;"
                                                onclick="hideshow()">
                                                <i id="slash" class="fa fa-eye-slash"></i>
                                                <i id="eye" class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align"
                                            style="font-weight: bold; font-size:15px;">Repeat password <span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="password" name="password2"
                                                data-validate-linked='password' required='required' id="password2"
                                                value="xyz@1234" />
                                        </div>
                                    </div>
                                @endrole

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="role"
                                        style="font-weight: bold; font-size:15px;">Roles <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6" style="margin-top: 8px;">
                                        <div class="row">
                                            @foreach ($roles as $groupName => $role)
                                                <div class="col-md-6">
                                                    <h4>{{ $groupName }}</h4>
                                                    <div class="row">
                                                        @foreach ($role as $item)
                                                            <div class="col-md-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input name="role_ids" class="form-check-input"
                                                                        type="radio"value="{{ $item->id }}"
                                                                        {{ $user->roles->contains('name', $item->name) ? 'checked' : '' }}
                                                                        id="{{ $item->id }}">
                                                                    <label style="font-weight: bold; font-size:13px;"
                                                                        class="form-check-label"
                                                                        for="{{ $item->id }}">{{ $item->name }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            @can('update-user')
                                                <button type="submit" class="btn btn-primary">ADD</button>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </form>
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

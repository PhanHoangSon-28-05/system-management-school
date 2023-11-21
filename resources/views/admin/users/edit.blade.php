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
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">
                            <form method="post" action="{{ route('users.update', $user->id) }}" id="demo-form"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"
                                        for="fullname"style="font-weight: bold; font-size:15px;">Full Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" data-validate-length-range="6"
                                            data-validate-words="2" value="{{ old('fullname') ?? $user->fullname }}"
                                            name="fullname" id="fullname" placeholder="Phan Hoàng Sơn"
                                            required="required" />
                                        @error('fullname')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"
                                        for="email"style="font-weight: bold; font-size:15px;">Email <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text"
                                            value="{{ old('email') ?? $user->email }}" id="email" name="email"
                                            class='email' required="required" type="email" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="birthday"
                                        style="font-weight: bold; font-size:15px;">Birthday<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" value="{{ old('birthday') ?? $user->birthday }}"
                                                name="birthday" required='required' class="form-control" id="date" />
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
                                                    {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary"
                                                data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="fe-male" class="join-btn"
                                                    {{ $user->gender == 'fe-male' ? 'checked' : '' }}>
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"for="phone"
                                        style="font-weight: bold; font-size:15px;">Telephone
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text"value="{{ old('phone') ?? $user->phone }}"
                                            id="phone" type="tel" class='tel' name="phone" required='required'
                                            data-validate-length-range="8,20" />
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align"for="role"
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
                                                                    <input name="role_ids[]" class="form-check-input"
                                                                        type="checkbox" value="{{ $item->id }}"
                                                                        {{ $user->roles->contains('name', $item->name) ? 'checked' : '' }}
                                                                        id="{{ $item->id }}">
                                                                    <label style="font-weight: bold; font-size:13px;"
                                                                        class="form-check-label"
                                                                        for="{{ $item->id }}">{{ $item->display_name }}</label>
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
                                            <button type="submit" class="btn btn-primary">ADD</button>
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

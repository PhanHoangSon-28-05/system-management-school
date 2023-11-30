@extends('layouts.client')

@section('content')
    <form class="form" method="post" action="{{ route('client.register.perform') }}"data-parsley-validate
        enctype="multipart/form-data">
        @csrf
        <h1 class="form__title">Create Account</h1>
        <div class="form__message form__message--error"></div>
        <div class="form__input-group">
            <input type="text" id="signupUsername" class="form__input" data-validate-length-range="6"
                data-validate-words="2" value="{{ old('fullname') }}" name="fullname" id="fullname"
                placeholder="Phan Hoàng Sơn" required="required" autofocus>
            <div class="form__input-error-message">
                @error('fullname')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <input type="email" class="form__input" autofocus placeholder="Email Address" value="{{ old('email') }}"
                id="email" name="email" class='email' required="required">
            <div class="form__input-error-message">
                @error('email')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
            </div>
        </div>
        <!-- Ô giới tính bằng radio button -->
        <div class="form__input-group">
            <label>Gender:</label>
            <label class="form__radio-label me-3">
                <input type="radio" name="gender" value="male" class="form__radio-input">
                Male
            </label>
            <label class="form__radio-label me-3">
                <input type="radio" name="gender" value="fe-male" class="form__radio-input">
                Female
            </label>
            <label class="form__radio-label">
                <input type="radio" name="gender" value="other" class="form__radio-input">
                Other
            </label>
        </div>
        <div class="form-group">
            <div class="input-group date" id="datepicker">
                <input type="text" value="{{ old('birthday') }}" name="birthday" required class="form__input"
                    id="date" placeholder="Birthday: YYYY-MM-DD" />
                <div class="input-group-append">
                    <span class="input-group-text bg-light">

                    </span>
                </div>
            </div>
            @error('birthday')
                <span class="text-danger">{{ $message }}</span><br>
            @enderror
        </div>


        <div class="form__input-group">
            <input type="password" class="form__input" autofocus placeholder="Password" value="{{ old('password') }}"
                id="password1" name="password" required>
            <div class="form__input-error-message">
                @error('password')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
            </div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" name="password2" data-validate-linked='password' required='required'
                autofocus placeholder="Confirm password">
            <div class="form__input-error-message"></div>
        </div>



        <!-- Trường nhập số điện thoại -->
        <div class="form__input-group">
            <input type="tel" class="form__input" autofocus placeholder="Phone Number" value="{{ old('phone') }}"
                id="phone" name="phone" required='required' data-validate-length-range="8,20">
            <div class="form__input-error-message">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span><br>
                @enderror
            </div>
        </div>

        <button class="form__button" type="submit">Continue</button>
    </form>
@endsection

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ URL::asset('admin/vendors/validator/multifield.js') }}"></script>
<script src="{{ URL::asset('admin/vendors/validator/validator.js') }}"></script>
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

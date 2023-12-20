@extends('user.layouts.app')
@section('title', 'Users')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            @if (session('massage'))
            <div>{{ session('massage') }}</div>
            @endif
            <style>
                .ul {
                    font-size: 20px;
                    list-style-type: none;
                }

                .li-newline {
                    clear: both;
                    margin-bottom: 10px;
                }
            </style>

            <div class="">
                <div class="">
                    <h3>General</h3>
                    <ul class="ul">
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Full Name
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                Nguyễn Văn A
                            </div>
                        </li>
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Gender
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                Nam
                            </div>
                        </li>
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Birthday
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                12/12/1992
                            </div>
                        </li>
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Hometown
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                Hà Nội
                            </div>
                        </li>
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Phone
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                0933999999
                            </div>
                        </li>
                        <li class="li-newline">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname" style="font-weight: bold; font-size:15px;">Email
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                a@gmail.com
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.delete-user').click(function(e) {
            e.preventDefault();

            var userId = $(this).data('user-id');
            if (confirm('Are you sure you want to delete user with ID ' + userId + '?')) {
                $.ajax({
                    url: '/admin/users/' + userId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
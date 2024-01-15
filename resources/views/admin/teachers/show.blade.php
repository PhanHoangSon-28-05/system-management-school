@extends('admin.layouts.app')

@section('title', 'Show Teacher')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show Teacher Information</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="teacher-info-container">
                                <div class="content-center w-100 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('public/uploads/teachers/individual/' . $teacher->image_personal) }}"
                                        alt="Teacher Image" class="img-circle profile_img w-25">
                                </div>
                                <div class="teacher-details mt-3">
                                    <ul>
                                        <li class="fs-5">
                                            <span class="label">Full Name:</span>
                                            {{ $teacher->name }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Teacher Code:</span>
                                            {{ $teacher->code }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Gender:</span>
                                            {{ $teacher->gender }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Birthday:</span>
                                            {{ $teacher->birthday }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Hometown:</span>
                                            {{ $teacher->hometown }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Phone:</span>
                                            {{ $teacher->phone }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Email:</span>
                                            {{ $teacher->email }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Citizen Identification Image:</span>
                                            <div class="identification-image">
                                                <div class="row">
                                                    <div class="col-6"><img width="400px" height="200px"
                                                            src="{{ asset('public/uploads/teachers/citizenIdentification/' . $teacher->image_citizenIdentification_front) }}"
                                                            alt="Identification Image">
                                                    </div>
                                                    <div class="col-6"><img width="400px" height="200px"
                                                            src="{{ asset('public/uploads/teachers/citizenIdentification/' . $teacher->image_citizenIdentification_backside) }}"
                                                            alt="Identification Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto p-2 bd-highlight">
                            @if ($check)
                            @else
                                <a class="btn btn-success btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                    href="{{ URL::route('teachers.users.addCountTeacher', $teacher->slug) }}"><i
                                        class="fas fa-user-plus"></i>
                                    <br />Create
                                    Acount
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

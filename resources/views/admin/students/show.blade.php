@extends('admin.layouts.app')

@section('title', 'Show Student')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show Student Information</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="student-info-container">
                                <div class="d-flex content-center">
                                    <img src="{{ asset('admin/build/images/' . $student->image_personal) }}"
                                        alt="student Image" class="img-circle profile_img">
                                </div>
                                <div class="student-details mt-3">
                                    <ul>
                                        <li class="fs-5">
                                            <span class="label">Full Name:</span>
                                            {{ $student->name }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">student Code:</span>
                                            {{ $student->code }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Gender:</span>
                                            {{ $student->gender }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Birthday:</span>
                                            {{ $student->birthday }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Hometown:</span>
                                            {{ $student->hometown }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Phone:</span>
                                            {{ $student->phone }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Email:</span>
                                            {{ $student->email }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Citizen Identification Image:</span>
                                            <div class="identification-image">
                                                <img src="{{ asset('admin/build/images/' . $student->image_citizenIdentification) }}"
                                                    alt="Identification Image">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto p-2 bd-highlight">
                            @if ($check)
                            @else
                                @can('create-usera-student')
                                    <a class="btn btn-success btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 "
                                        href="{{ URL::route('students.users.addCountStudent', $student->slug) }}"><i
                                            class="fas fa-user-plus"></i>
                                        <br />Create
                                        Acount
                                    </a>
                                @endcan
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

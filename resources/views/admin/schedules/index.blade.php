@extends('admin.layouts.app')
@section('title', 'Schedule')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Schedules</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12  text-center">
                                </div>
                                <div class="clearfix"></div>
                                <div id="card-list" class="row" style="margin:auto">
                                    @foreach ($teacherSchedules as $teacherSchedule)
                                        <div class="col-md-4 col-sm-4  profile_details search">
                                            @can('show-schedule')
                                                <a href="{{ route('schedules.show', $teacherSchedule->slug) }}">
                                                @endcan
                                                <form action="ttm" method="post">
                                                    {!! csrf_field() !!}
                                                    <div class="well profile_view">
                                                        <div class="col-sm-12">
                                                            <h4 class="brief"><i>{{ $teacherSchedule->code }}</i>
                                                            </h4>
                                                            <div class="left col-md-7 col-sm-7">
                                                                <h2>{{ $teacherSchedule->last_name . ' ' . $teacherSchedule->first_name }}
                                                                </h2>
                                                                <p><strong>Emai: </strong>
                                                                    {{ $teacherSchedule->email }}
                                                                </p>
                                                                <ul class="list-unstyled">
                                                                    <li><i class="fa fa-building"></i> Address:
                                                                        {{ $teacherSchedule->hometown }}</li>
                                                                    <li><i class="fa fa-phone"></i> Phone #:
                                                                        {{ $teacherSchedule->phone }}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="right col-md-5 col-sm-5 text-center">
                                                                <img src="{{ asset('public/uploads/teachers/individual/' . $teacherSchedule->image_personal) }}"
                                                                    alt="" class="img-circle img-fluid w25">
                                                            </div>
                                                        </div>
                                                        <div class=" profile-bottom text-center">
                                                            <div class=" col-sm-6 emphasis">
                                                            </div>
                                                            <div class=" col-sm-6 emphasis">
                                                                @can('show-teacher')
                                                                    <a href="{{ URL::route('teachers.show', $teacherSchedule->id) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-user"> </i> View Profile
                                                                    </a>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                @can('show-schedule')
                                                </a>
                                            @endcan
                                        </div>
                                    @endforeach
                                    {{ $teacherSchedules->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

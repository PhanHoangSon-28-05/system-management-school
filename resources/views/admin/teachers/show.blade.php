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
                                            <span class="label">Department:</span>
                                            {{ $teacher->detail__departments->first()->name }}
                                        </li>
                                        <li class="fs-5">
                                            <span class="label">Teaching subjects:</span>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                                                List Subject
                                            </button>

                                            <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1"
                                                id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                                                <div class="offcanvas-header">
                                                    <h5 class="offcanvas-title" id="staticBackdropLabel">List Subject</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <div>
                                                        <div class="row">
                                                            <form method="post"
                                                                action="{{ route('teachers.add_subjectGiveteacher', $teacher->id) }}"
                                                                enctype="multipart/form-data" data-parsley-validate>
                                                                @csrf
                                                                <div class="col-md-10 col-sm-10">
                                                                    <select class="form-select"
                                                                        aria-label="Default select example"
                                                                        name="subject_id">
                                                                        <option value="null" selected>Open this
                                                                            select Subject</option>
                                                                        @foreach ($subjects as $subject)
                                                                            <option value="{{ $subject->id }}">
                                                                                {{ $subject->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2 col-sm-2">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">ADD</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <table id="" class="table table-striped table-bordered"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Subject Name</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="subjectContainer">
                                                                {{-- {{ dd($teacher->detail_subjects) }} --}}
                                                                @if ($teacher->detail_subjects)
                                                                    @foreach ($teacher->detail_subjects->get() as $subject)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $subject->subjects->name }}</td>
                                                                            <td>
                                                                                <div class="btn-group">
                                                                                    <form method="POST"
                                                                                        action="{{ route('teachers.destroy_subjectGiveteacher', [$teacher->id, $subject->id]) }}"
                                                                                        class="d-inline">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3"
                                                                                            onclick="return confirm('Are you sure you want to delete this subject?')">
                                                                                            <i class="fas fa-trash-alt"></i>
                                                                                            Delete
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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

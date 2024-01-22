@extends('admin.layouts.app')
@section('title', 'Add Score Student')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">

                    <h3>Add Score Student</h3>
                </div>
            </div>
            <div class="clearfix"><a href="{{ URL::route('scores.show', $slugGrade) }}" type="button" href=""
                    class="btn btn-secondary">
                    <i class="fas fa-backward"></i>
                </a></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">
                            <!-- start form for validation -->
                            <form method="post" action="{{ route('scores.add', $slugGrade) }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectOption" name="subject_id"
                                                aria-label="Floating label select example">
                                                <option value="">Select subject:</option>
                                                @foreach ($subjects as $subject)
                                                    @if ($subject->subjects)
                                                        <option value="{{ $subject->subjects->id }}">
                                                            {{ $subject->subjects->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Name Subject</label>
                                        </div>
                                        @error('subject_id')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                @foreach ($students as $student)
                                    <div class="field item form-group">
                                        <div class="col-md-2 col-sm-6">
                                            <label class=" label-align"
                                                for="">{{ $student->last_name . ' ' . $student->first_name }}</label>
                                            <div class="">
                                                <input type="text" class="form-control" id=""
                                                    name="student_id[]" value="{{ $student->id }}" style="display: none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field item form-group">

                                        <div class="col-md-2 col-sm-6">
                                            <label class=" label-align" for="attendance">Điểm chuyên
                                                cần:</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="attendance"
                                                    name="attendance[]" placeholder="Nhập điểm chuyên cần" value="0"
                                                    min="0" max="10">
                                            </div>
                                            @error('attendance')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <label class=" label-align" for="scores_2_1">Điểm hệ số
                                                2 lần 1:</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="scores_2_1"
                                                    name="scores_2_1[]" placeholder="Nhập điểm hệ số 2 lần 1" value="0"
                                                    min="0" max="10">
                                            </div>
                                            @error('scores_2_1')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <label class=" label-align" for="scores_2_2">Điểm hệ số
                                                2 lần 2:</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="scores_2_2"
                                                    name="scores_2_2[]" placeholder="Nhập điểm hệ số 2 lần 2" value="0"
                                                    min="0" max="10">
                                            </div>
                                            @error('scores_2_2')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        </div>
                                        <div class="col-md-2 col-sm-6">
                                            <label class=" label-align" for="final_score">Điểm cuối
                                                kỳ:</label>
                                            <div class="">
                                                <input type="number" class="form-control" id="final_score"
                                                    name="final_score[]" placeholder="Nhập điểm cuối kỳ" value="0"
                                                    min="0" max="10">
                                            </div>
                                            @error('final_score')
                                                <span class="text-danger">{{ $message }}</span><br>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-md-2 col-sm-6">
                                            <label class=" label-align" for="medium_score">Điểm kết thúc môn:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="medium_score"
                                                    name="medium_score[]" placeholder="Điểm trung bình">
                                                <small class="form-text text-muted">Ghi chú: Điểm trung bình = (Điểm
                                                    chuyên
                                                    cần
                                                    + (Điểm hệ số 2 lần 1 * 2) + (Điểm hệ số 2 lần 2 * 2) + (Điểm hệ số
                                                    2 *
                                                    3)
                                                    )/8</small>
                                            </div>
                                        </div> --}}
                                    </div>
                                @endforeach
                                <br />
                                <div class="text-center">
                                    @can('create-score')
                                        <button type="submit" class="btn btn-primary">ADD</button>
                                    @endcan
                                </div>
                            </form>
                            <!-- end form for validations -->
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content" id="selectedInfo">
                            @foreach ($students as $student)
                                <div class="student-info-container" id="{{ $student->id }}" style="display: none;">
                                    <div class="right col-md-5 col-sm-5 text-center">
                                        <img src="{{ asset('public/uploads/students/individual/' . $student->image_personal) }}"
                                            alt="" class="img-circle img-fluid w-75">
                                    </div>
                                    <div class="student-details mt-3">
                                        <ul>
                                            <li class="fs-5">
                                                <span class="label">Name:</span>
                                                {{ $student->last_name . ' ' . $student->first_name }}
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
                                        </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
    <script>
        document.getElementById('selectOption').addEventListener('change', function() {
            var selectedOption = this.value;

            // Hide all student-info-container elements
            var studentInfoContainers = document.querySelectorAll('.student-info-container');
            studentInfoContainers.forEach(function(container) {
                container.style.display = 'none';
            });
            document.getElementById(selectedOption).style.display = 'block';
        });


        // Lắng nghe sự kiện khi giá trị của các input thay đổi
        document.addEventListener('input', function(event) {
            // Kiểm tra xem sự kiện là từ input nào
            if (event.target.id === 'attendance' || event.target.id === 'scores_2_1' || event.target.id ===
                'scores_2_2' || event.target.id === 'final_score') {
                // Lấy giá trị từ các input
                var attendance = parseFloat(document.getElementById('attendance').value) || 0;
                var scores_2_1 = parseFloat(document.getElementById('scores_2_1').value) || 0;
                var scores_2_2 = parseFloat(document.getElementById('scores_2_2').value) || 0;
                var final_score = parseFloat(document.getElementById('final_score').value) || 0;

                // Tính toán theo công thức
                var medium_score = (attendance + (scores_2_1 * 2 + scores_2_2 * 2) + final_score * 3) / 8;

                // Hiển thị giá trị tính toán trong input cuối cùng
                if (medium_score >= 10) {
                    document.getElementById('medium_score').value = "Sai điểm";
                } else {
                    document.getElementById('medium_score').value = medium_score.toFixed(2);
                }
            }
        });
    </script>
@endsection --}}

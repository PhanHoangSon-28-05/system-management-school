@extends('admin.layouts.app')
@section('title', 'Edit Score Student')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Score Student</h3>

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">
                            <!-- start form for validation -->
                            <form method="post" action="{{ route('scores.update', [$slugGrade, $score->id]) }}"
                                id="demo-form" data-parsley-validate>
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <div class="col-md-10 col-sm-6">
                                        <div class="form-floating">
                                            <h3 class="text-center">{{ $score->subjects->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <div class="field item form-group col-md-10">
                                        <div class="col-md-3 col-sm-6">
                                            <label class=" label-align" for="attendance">Điểm chuyên
                                                cần:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="attendance" name="attendance"
                                                    placeholder="Nhập điểm chuyên cần"
                                                    value="{{ $score->detail_scores->attendance }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <label class=" label-align" for="scores_2_1">Điểm hệ số
                                                2 lần 1:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="scores_2_1" name="scores_2_1"
                                                    placeholder="Nhập điểm hệ số 2 lần 1"
                                                    value="{{ $score->detail_scores->scores_2_1 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <label class=" label-align" for="scores_2_2">Điểm hệ số
                                                2 lần 2:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="scores_2_2" name="scores_2_2"
                                                    placeholder="Nhập điểm hệ số 2 lần 2"
                                                    value="{{ $score->detail_scores->scores_2_2 }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <label class=" label-align" for="final_score">Điểm cuối
                                                kỳ:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="final_score"
                                                    name="final_score" placeholder="Nhập điểm cuối kỳ"
                                                    value="{{ $score->detail_scores->final_score }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <label class=" label-align" for="medium_score">Điểm kết thúc môn:</label>
                                            <div class="">
                                                <input type="text" class="form-control" id="medium_score"
                                                    name="medium_score" placeholder="Điểm trung bình"
                                                    value="{{ $score->detail_scores->medium_score }}" readonly>
                                                <small class="form-text text-muted">Ghi chú: Điểm trung bình = (Điểm chuyên
                                                    cần
                                                    + Điểm hệ số 2 lần 1 + Điểm hệ số 2 lần 2) * 0.4 + Điểm hệ số 2 *
                                                    0.6</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content" id="selectedInfo">
                            <div class="student-info-container" id="{{ $student->id }}">
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
                                            <span class="label">Student Code:</span>
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
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
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
                var medium_score = (attendance + scores_2_1 + scores_2_2) * 0.4 + final_score * 0.6;

                // Hiển thị giá trị tính toán trong input cuối cùng
                if (medium_score >= 10) {
                    document.getElementById('medium_score').value = "Sai điểm";
                } else {
                    document.getElementById('medium_score').value = medium_score.toFixed(2);
                }
            }
        });
    </script>
@endsection

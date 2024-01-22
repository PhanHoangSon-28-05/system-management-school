@extends('admin.layouts.app')
@section('title', 'Add Schedule')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add Schedule</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6 col-sm-6 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('schedules.teachers-scheldule.store', $slugTeacher) }}"
                                id="demo-form" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Rank
                                        <span class="required" style="color: red;">*</span>
                                    </label>
                                    <div class=" col-sm-9 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" name="rank_id"
                                            id="rankSelect">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($ranks as $rank)
                                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('rank_id')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Period
                                        <span class="required" style="color: red;">*</span>
                                    </label>
                                    <div class="col-sm-9 col-sm-6" id="periodsContainer">
                                        @foreach ($periods as $period)
                                            <div class="col-md-4">
                                                <div class="form-check form-check-inline">
                                                    <input name="period_ids[]" class="form-check-input " type="checkbox"
                                                        value="{{ $period->id }}" id="{{ $period->id }}">
                                                    <label style="font-weight: bold; font-size:15px;"
                                                        class="form-check-label"
                                                        for="{{ $period->id }}">{{ $period->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('period_ids')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Class
                                        <span class="required" style="color: red;">*</span>
                                    </label>
                                    <div class=" col-sm-9 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" name="grade_id"
                                            id="gradeSelect">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($geades as $geade)
                                                <option value="{{ $geade->id }}">{{ $geade->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('grade_id')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Subject
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class=" col-sm-9 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" name="subject_id">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subjects->id }}">
                                                    {{ $subject->subjects->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Room
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class=" col-sm-9 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" name="room_id"
                                            id="roomSelect">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('room_id')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="numerical-order"
                                        style="font-weight: bold; font-size:15px;">
                                        Effect
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class=" col-sm-9 col-sm-6">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="input-prepend input-group">
                                                        <span class="add-on input-group-addon"><i
                                                                class="fa fa-calendar"></i></span>
                                                        <input type="text" name="effect" id="reservation-time"
                                                            class="form-control" value="01/01/2016 - 01/25/2016" />
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        @error('effect')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>
                                @can('create-schedule')
                                    <button type="submit" class="btn btn-primary">ADD</button>
                                @endcan

                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
                <div class="col-md-12  col-sm-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                @foreach ($ranks as $rank)
                                    <th>{{ $rank->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 1;
                            @endphp
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <th>T{{ $total }}</th>
                                    @foreach ($schedule as $value)
                                        {{-- {{ dd($value->grades->name) }} --}}
                                        <td width="200px">
                                            @if ($value != null)
                                                <a>
                                                    {{ $value->grades->name }}
                                                </a>
                                            @else
                                            @endif
                                        </td>
                                    @endforeach
                                    @php
                                        $total += 1;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var rankSelect = document.getElementById('rankSelect');
        var periodsContainer = document.getElementById('periodsContainer');

        rankSelect.addEventListener('change', function() {
            var rankId = rankSelect.value;
            var slugTeacher =
                '{{ $slugTeacher }}';
            $.ajax({
                url: '{{ route('schedules.teachers-scheldule.rank-update-periods', ['rankId' => 'rankId', 'slugTeacher' => 'slugTeacher']) }}',
                type: 'GET',
                data: {
                    rankId: rankId,
                    slugTeacher: slugTeacher
                },
                success: function(data) {
                    periodsContainer.innerHTML = '';

                    data.forEach(function(period) {
                        var periodCheckbox = document.createElement('div');
                        periodCheckbox.className = 'col-md-4';
                        periodCheckbox.innerHTML = `
                            <div class="form-check form-check-inline">
                                <input name="period_ids[]" class="form-check-input" type="checkbox" value="${period.id}" id="${period.id}">
                                <label style="font-weight: bold; font-size:15px;" class="form-check-label" for="${period.id}">${period.name}</label>
                            </div>
                        `;
                        periodsContainer.appendChild(periodCheckbox);
                    });
                },
                error: function(error) {
                    console.error('Error fetching periods:', error);
                }
            });
        });

        periodsContainer.addEventListener('change', function() {
            var periodIds = [];
            var checkboxes = document.querySelectorAll('input[name="period_ids[]"]:checked');
            checkboxes.forEach(function(checkbox) {
                periodIds.push(checkbox.value);
            });

            var rankId = rankSelect.value;

            $.ajax({
                url: '{{ route('schedules.teachers-scheldule.get-grades', ['periodId' => ':periodId']) }}'
                    .replace(
                        ':periodId', periodIds.join(',')),
                type: 'GET',
                data: {
                    rank_id: rankId
                },
                success: function(data) {
                    var gradeSelect = document.getElementById('gradeSelect');
                    gradeSelect.innerHTML =
                        '<option value="null" selected>Open this select menu</option>';

                    data.grades.forEach(function(grade) {
                        var option = document.createElement('option');
                        option.value = grade.id;
                        option.textContent = grade.name;
                        gradeSelect.appendChild(option);
                    });
                },
                error: function(error) {
                    console.error('Error fetching grades:', error);
                }
            });

            $.ajax({
                url: '{{ route('schedules.teachers-scheldule.get-rooms', ['periodId' => ':periodId']) }}'
                    .replace(
                        ':periodId', periodIds.join(',')),
                type: 'GET',
                data: {
                    rank_id: rankId
                },
                success: function(data) {
                    var roomSelect = document.getElementById('roomSelect');
                    roomSelect.innerHTML =
                        '<option value="null" selected>Open this select menu</option>';

                    data.rooms.forEach(function(room) {
                        var option = document.createElement('option');
                        option.value = room.id;
                        option.textContent = room.name;
                        roomSelect.appendChild(option);
                    });
                },
                error: function(error) {
                    console.error('Error fetching rooms:', error);
                }
            });
        });

    });
</script>

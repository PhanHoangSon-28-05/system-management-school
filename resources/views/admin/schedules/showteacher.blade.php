@extends('admin.layouts.app')
@section('title', 'Schedule')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a type="button"
                            href="{{ URL::route('schedules.teachers-scheldule.add-scheldule-teacher', $slugTeacher) }}"
                            class="btn float-end btn-info text-white">
                            ADD
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach ($ranks as $rank)
                                        <th width="188px">{{ $rank->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 1;
                                @endphp
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <th>Tiết {{ $total }}</th>
                                        @foreach ($schedule as $value)
                                            {{-- {{ dd($value->grades->name) }} --}}
                                            {{-- {{ dd($value) }} --}}
                                            <td>
                                                @if ($value != null)
                                                    <a
                                                        href=" {{ URL::route('schedules.teachers-scheldule.edit-scheldule-teacher', [$slugTeacher, $value->id]) }}">
                                                        Lớp: {{ $value->grades->name }}
                                                        <br>
                                                        Môn:
                                                        {{-- {{ dd($value->detail_schedule) }} --}}
                                                        {{ $value->detail_schedule->subjects->name }}
                                                        <br>
                                                        Phòng:
                                                        {{ $value->detail_schedule->rooms->name }}
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
    </div>

@endsection

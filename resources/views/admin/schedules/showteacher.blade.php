@extends('admin.layouts.app')
@section('title', 'Schedule')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bordered table <small>Bordered table subtitle</small></h2>
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
                                        <th>{{ $rank->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periods as $period)
                                    <tr>
                                        <th scope="row">
                                            {{ $period->name }}
                                        </th>
                                        @foreach ($scheduleRanks as $scheduleRank)
                                            @if ($scheduleRank != null)
                                                @foreach ($scheduleProids as $array)
                                                    @foreach ($array as $value)
                                                        @php
                                                            $value = $array->first(); // Get the first value in the array
                                                        @endphp
                                                        <td>
                                                            @if ($value && $value->detail_schedule)
                                                                {{ $value->grades->name }}
                                                                <br>
                                                                <span>{{ $value->detail_schedule->subjects ? $value->detail_schedule->subjects->name : 'N/A' }}</span>
                                                                <br>
                                                                <span>{{ $value->detail_schedule->rooms ? $value->detail_schedule->rooms->name : 'N/A' }}</span>
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endforeach
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

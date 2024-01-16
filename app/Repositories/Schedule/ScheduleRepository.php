<?php

namespace App\Repositories\Schedule;

use App\Models\Detail_Schedule;
use App\Models\Period;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Repositories\BaseRepository;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use Illuminate\Support\Str;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Schedule::class;
    }

    public function getSchedulePeroid($slugTeacher, $period_id)
    {
        $idTeacher = Teacher::where('slug', $slugTeacher)->first();
        $teacher_id = $idTeacher->id;
        $viewProid = $this->model->where('teacher_id', $teacher_id)->where('period_id', $period_id)->get();
        return $viewProid;
    }

    public function getTeachersNotInProid($attributes = [])
    {
        // Lấy rankId và slugTeacher từ request
        $rankId = $attributes['rankId'];
        $slugTeacher = $attributes['slugTeacher'];

        $idTeacher = Teacher::where('slug', $slugTeacher)->first();
        $teacher_id = $idTeacher->id;

        // Fetch periods based on the selected rank and teacher ID
        $periods = Period::whereNotIn('id', function ($query) use ($teacher_id, $rankId) {
            $query->select('period_id')
                ->from('schedules')
                ->where('teacher_id', $teacher_id)
                ->where('rank_id', $rankId);
        })->get();
        // dd($periods);
        return $periods;
    }

    public function checkTeacheSchedule($attributes = [])
    {
        $rank_id = $attributes['rank_id'];
        $period_ids = $attributes['period_ids'];
        $room_id = $attributes['room_id'];
        $success = '';

        foreach ($period_ids as $value) {
            $schedule = $this->model->where('rank_id', $rank_id)->where('period_id', $value)->first();

            if ($schedule) {
                $detailSchedule = $schedule->detail_schedule;
                $periods = $schedule->periods;
                if ($detailSchedule) {
                    $checkroom = $detailSchedule->where('room_id', $room_id)->first();

                    if ($checkroom) {
                        if ($checkroom->rooms) {
                            $success .= '\nPhòng ' . $checkroom->rooms->name . ' đã có lớp dạy ' . $periods->name . '.';
                        } else {
                            $success .= '\nChi tiết lịch học không có thông tin phòng.';
                        }
                    }
                }
            }
        }

        return $success;
    }

    public function createTeacheSchedule($attributes = [], $slugTeacher)
    {
        $idTeacher = Teacher::where('slug', $slugTeacher)->first();
        $attributes['teacher_id'] = $idTeacher->id;

        $period_id = $attributes['period_ids'];
        // dd($attributes);

        foreach ($period_id as $value) {
            $attributes['period_id'] = $value;
            $schedule = $this->model->create($attributes);
            $id_schedule = $this->model->where('teacher_id', $attributes['teacher_id'])->orderBy('id', 'desc')->first();
            $attributes['schedule_id'] = $id_schedule->id;
            $detail_schel = Detail_Schedule::create($attributes);
        }

        return true;
    }
}

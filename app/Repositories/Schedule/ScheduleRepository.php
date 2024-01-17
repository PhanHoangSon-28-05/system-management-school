<?php

namespace App\Repositories\Schedule;

use App\Models\Detail_Schedule;
use App\Models\Detail_Teacher;
use App\Models\Grade;
use App\Models\Period;
use App\Models\Rank_Schedule;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Subject;
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

    public function getAllGradeInProidAndRank($attributes = [], $periodId)
    {
        $rankId = $attributes['rank_id'];

        $existingGradeIds = Schedule::where('rank_id', $rankId)
            ->whereHas('periods', function ($query) use ($periodId) {
                $query->where('periods.id', $periodId);
            })
            ->pluck('grade_id');

        return $existingGradeIds;
    }

    public function getGradeNoInProidAndRank($allgradeIds)
    {
        $grades = Grade::whereNotIn('id', function ($query) use ($allgradeIds) {
            $query->select('grade_id')
                ->from('schedules')
                ->whereIn('grade_id', $allgradeIds);
        })->get();

        return $grades;
    }

    public function getAllRoomInProidAndRank($attributes = [], $periodId)
    {
        $rankId = $attributes['rank_id'];

        $scheduleIds = Schedule::where('rank_id', $rankId)
            ->whereHas('periods', function ($query) use ($periodId) {
                $query->where('periods.id', $periodId);
            })->pluck('id');
        // dd($scheduleIds);
        $existingRoomIds = Detail_Schedule::whereIn('schedule_id', $scheduleIds)->pluck('room_id');
        // dd($existingRoomIds);
        return $existingRoomIds;
    }

    public function getRoomNoInProidAndRank($allroomIds)
    {
        $rooms = Room::whereNotIn('id', function ($query) use ($allroomIds) {
            $query->select('room_id')
                ->from('detail__schedules')
                ->whereIn('room_id', $allroomIds);
        })->get();

        return $rooms;
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

    public function selectIdRank($id)
    {
        $ranks = Rank_Schedule::orderByRaw("id = $id DESC")->get();

        return $ranks;
    }

    public function selectIdGrade($id)
    {
        $grades = Grade::orderByRaw("id = $id DESC")->get();

        return $grades;
    }

    public function selectIdSubject($idTeacher, $idSubject)
    {
        $subjects = Detail_Teacher::where('teacher_id', $idTeacher)
            ->orderByRaw("subject_id = $idSubject DESC")
            ->get();

        return $subjects;
    }

    public function selectIdRoom($id)
    {
        $rooms = Room::orderByRaw("id = $id DESC")->get();

        return $rooms;
    }

    public function updateTeacheSchedule($attributes = [], $id)
    {
        $schedule = $this->model->find($id);
        $detailschedule = Detail_Schedule::where('schedule_id', $id)->first();

        if ($schedule) {
            $schedule->update($attributes);
            $detailschedule->update($attributes);
            return $schedule;
        }
    }
}

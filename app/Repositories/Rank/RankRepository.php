<?php

namespace App\Repositories\Rank;

use App\Models\Teacher;
use App\Repositories\BaseRepository;
use App\Repositories\Rank\RankRepositoryInterface;
use Illuminate\Support\Str;

class RankRepository extends BaseRepository implements RankRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Rank_Schedule::class;
    }

    public function checkRank($slugTeacher, $slugRank)
    {
        $check = $this->model->where('slug', $slugRank)->first();

        if (!$check) {
            return null;
        }
        $valueRank = $check->rank_schedule;
        if (!$valueRank) {
            return null;
        }

        $idTeacher = Teacher::where('slug', $slugTeacher)->first();
        if (!$idTeacher) {
            return null;
        }
        $teacher_id = $idTeacher->id;
        $valueScheduleTeacher = $valueRank->where('teacher_id', $teacher_id)->get();
        return $valueScheduleTeacher;
    }
}

<?php

namespace App\Repositories\Rank;

use App\Models\Period;
use App\Models\Schedule;
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

    public function checkRank($slugTeacher)
    {
        $idTeacher = Teacher::where('slug', $slugTeacher)->first();

        if (!$idTeacher) {
            return null;
        }
        $teacher_id = $idTeacher->id;

        $peripds = Period::all();
        $ranks = $this->model->all();

        $schedules = [];

        foreach ($peripds as $peripd) {
            foreach ($ranks as $rank) {
                $check = Schedule::where('teacher_id', $teacher_id)
                    ->where('period_id', $peripd->id)
                    ->where('rank_id', $rank->id)->first();


                $schedules[$peripd->slug][$rank->slug] = $check;
            }
        }
        // dd($schedules);
        return $schedules;
    }
}

<?php

namespace App\Repositories\Schedule;

use App\Repositories\RepositoryInterface;

interface ScheduleRepositoryInterface extends RepositoryInterface
{
    public function getSchedulePeroid($slugTeacher, $period_id);
    public function getTeachersNotInProid($attributes = []);
    public function checkTeacheSchedule($attributes = []);
    public function createTeacheSchedule($attributes = [], $slugTeacher);
}

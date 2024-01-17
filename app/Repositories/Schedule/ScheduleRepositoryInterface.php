<?php

namespace App\Repositories\Schedule;

use App\Repositories\RepositoryInterface;

interface ScheduleRepositoryInterface extends RepositoryInterface
{
    public function getSchedulePeroid($slugTeacher, $period_id);

    public function getTeachersNotInProid($attributes = []);
    public function getAllGradeInProidAndRank($attributes = [], $periodId);

    public function getAllRoomInProidAndRank($attributes = [], $periodId);
    public function getRoomNoInProidAndRank($allroomIds);

    public function getGradeNoInProidAndRank($allgradrIds);
    public function checkTeacheSchedule($attributes = []);
    public function createTeacheSchedule($attributes = [], $slugTeacher);

    public function selectIdRank($id);
    public function selectIdGrade($id);
    public function selectIdSubject($idTeacher, $idSubject);
    public function selectIdRoom($id);

    public function updateTeacheSchedule($attributes = [], $id);
}

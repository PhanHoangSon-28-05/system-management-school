<?php

namespace App\Repositories\Score;

use App\Repositories\RepositoryInterface;

interface ScoreRepositoryInterface extends RepositoryInterface
{
    public function getStudentsNotInGradeScorce($gradeId, $allStudentIds);
    public function departmentTeacher();
    public function addScore($attributes = []);
    public function viewscore($slugStudent);
    public function updateScore($attributes = [], $score_id);
}

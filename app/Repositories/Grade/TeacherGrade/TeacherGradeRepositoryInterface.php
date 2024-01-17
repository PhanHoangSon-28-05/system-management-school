<?php

namespace App\Repositories\Grade\TeacherGrade;

use App\Repositories\RepositoryInterface;

interface TeacherGradeRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function indexTeacher_Grade($slug);
    public function indexHomeroomTeacher_Grade($slug);
    public function index_Grade($slug);
    public function checkHomeroomTeacher($slugGrade);
    public function getAllTeacherIds();
    public function getTeachersNotInGrade($allTeacherIds);
    public function createTeacherGrade($all);
    public function edit_Grade($slug);
    public function updateTeacher_Grade($id_Teacher, $attributes = []);
}

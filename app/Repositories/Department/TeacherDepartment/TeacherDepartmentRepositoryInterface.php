<?php

namespace App\Repositories\Department\TeacherDepartment;

use App\Repositories\RepositoryInterface;

interface TeacherDepartmentRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function indexTeacher_Department($slug);
    public function index_Department($slug);
    public function getAllTeacherIds();
    public function getTeachersNotInDepartment($allTeacherIds);
    public function edit_Department($slug);
    public function updateTeacher_Department($id_Teacher, $attributes = []);
}

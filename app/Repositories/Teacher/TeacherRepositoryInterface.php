<?php

namespace App\Repositories\Teacher;

use App\Repositories\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên

    public function findById(String $id);
    public function insertTeacher($attributes = []);
    public function updateTeacher($attributes = [], $id);
    public function deleteTeacher($id);
}

<?php

namespace App\Repositories\Teacher;

use App\Repositories\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getAllTeacher();
    public function findById(String $id);
    public function subjectGiveteacher($attributes = [], string $id);
    public function delete_subjectGiveteacher(string $id);
    public function getTeacherToSlug($slug);
    public function insertTeacher($attributes = []);
    public function updateTeacher($attributes = [], $id);
    public function deleteTeacher($id);
    public function checkAccountTeacher(string $id);
}

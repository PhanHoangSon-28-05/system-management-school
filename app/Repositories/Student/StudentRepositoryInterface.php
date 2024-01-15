<?php

namespace App\Repositories\Student;

use App\Repositories\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getStudentToSlug($slug);
    public function insertStudent($attributes = []);
    public function updateStudent($attributes = [], $id);
    public function deleteStudent($id);
    public function checkAccountStudent(string $id);
}

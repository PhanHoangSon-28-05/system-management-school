<?php

namespace App\Repositories\Subject;

use App\Repositories\RepositoryInterface;

interface SubjectRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getSubjectDepartment();
    public function insertSubject($attributes = []);
    public function updateSubject($attributes = [], $id);
}

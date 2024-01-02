<?php

namespace App\Repositories\Grade;

use App\Repositories\RepositoryInterface;

interface GradeRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getGrade();
    public function insertGrade($attributes = []);
    public function updateGrade($attributes = [], $id);
}

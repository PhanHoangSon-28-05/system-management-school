<?php

namespace App\Repositories\Department;

use App\Repositories\RepositoryInterface;

interface DepartmentRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getDepartment();
    public function insertDepartment($attributes = []);
    public function updateDepartment($attributes = [], $id);
}

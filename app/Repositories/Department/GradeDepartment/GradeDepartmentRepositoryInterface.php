<?php

namespace App\Repositories\Department\GradeDepartment;

use App\Repositories\RepositoryInterface;

interface GradeDepartmentRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function indexGrade_Department($slug);
    public function index_Department($slug);
    public function getAllGradeIds();
    public function getGradesNotInDepartment($allGradeIds);
    public function edit_Department($slug);
    public function updateGrade_Department($id_Grade, $attributes = []);
}

<?php

namespace App\Repositories\Grade\StudentGrade;

use App\Repositories\RepositoryInterface;

interface StudentGradeRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function indexStudent_Grade($slug);
    public function index_Grade($slug);
    public function getAllStudentIds();
    public function getStudentsNotInGrade($allStudentIds);
    public function createStudentGrade($all);
    public function edit_Grade($slug);
    public function updateStudent_Grade($id_Student, $attributes = []);
}

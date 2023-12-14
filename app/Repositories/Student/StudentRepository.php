<?php

namespace App\Repositories\Student;

use App\Repositories\BaseRepository;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Support\Str;

class StudentRepository extends BaseRepository implements StudentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Student::class;
    }

    public function getStudent()
    {
        return $this->model->select('Student_name')->take(5)->get();
    }

    public function insertStudent($attributes = [])
    {
        // Implement your logic to insert a user here
    }

    public function updateStudent($attributes = [], $id)
    {
        // Implement your logic to update a user here
    }
}

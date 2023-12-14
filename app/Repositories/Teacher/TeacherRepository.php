<?php

namespace App\Repositories\Teacher;

use App\Repositories\BaseRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Str;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Teacher::class;
    }

    public function getTeacher()
    {
        return $this->model->select('Teacher_name')->take(5)->get();
    }

    public function insertTeacher($attributes = [])
    {
        // Implement your logic to insert a user here
    }

    public function updateTeacher($attributes = [], $id)
    {
        // Implement your logic to update a user here
    }
}

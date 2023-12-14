<?php

namespace App\Repositories\Classs;

use App\Repositories\BaseRepository;
use App\Repositories\Classs\ClassRepositoryInterface;
use Illuminate\Support\Str;

class ClassRepository extends BaseRepository implements ClassRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Grade::class;
    }

    public function getClass()
    {
        return $this->model->select('Class_name')->take(5)->get();
    }

    public function insertClass($attributes = [])
    {
        // Implement your logic to insert a user here
    }

    public function updateClass($attributes = [], $id)
    {
        // Implement your logic to update a user here
    }
}

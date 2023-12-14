<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUser()
    {
        return $this->model->select('User_name')->take(5)->get();
    }

    public function insertUser($attributes = [])
    {
        // Implement your logic to insert a user here
    }

    public function updateUser($attributes = [], $id)
    {
        // Implement your logic to update a user here
    }
}

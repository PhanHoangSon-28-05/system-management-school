<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getUser();
    public function insertUser($attributes = []);
    public function updateUser($attributes = [], $id);
}

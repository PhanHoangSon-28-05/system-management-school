<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getUser();
    public function insertUserTeacher($attributes = [], $idTeacher);
    public function insertUserStudent($attributes = [], $idStudent);
    public function editUser($id);
    public function updateUser($attributes = [], $id);
}

<?php

namespace App\Repositories\Role;

use App\Repositories\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getRoles();
    public function getRole();
    public function insertRole($attributes = []);
    public function updateRole($attributes = [], $id);
}

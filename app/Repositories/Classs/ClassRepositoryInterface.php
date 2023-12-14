<?php

namespace App\Repositories\Classs;

use App\Repositories\RepositoryInterface;

interface ClassRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getClass();
    public function insertClass($attributes = []);
    public function updateClass($attributes = [], $id);
}

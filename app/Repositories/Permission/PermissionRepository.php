<?php

namespace App\Repositories\Permission;

use App\Models\Permission;
use App\Repositories\BaseRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function getModel()
    {
        return Permission::class;
    }
    public function getPermissionGroup()
    {
        $vale = $this->model->all()->groupby('group');
        // dd($vale);
        return $vale;
    }
}

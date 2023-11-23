<?php

namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function getRole()
    {
        return $this->model->select('Role_name')->take(5)->get();
    }

    public function updateRole($status, $id)
    {
        $result = $this->model->where('id', $id)->first();
        $update_status = $result->users()->first()->pivot;
        $update_status->update(['status' => $status]);
        return $update_status;
    }
}

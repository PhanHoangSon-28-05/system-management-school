<?php

namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Support\Str;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function getRoles()
    {
        return $this->model->all()->groupby('group');
    }

    public function getRole()
    {
        return $this->model->select('Role_name')->take(5)->get();
    }

    public function insertRole($attributes = [])
    {
        $existingRole = $this->model->where('name',  Str::slug($attributes['display_name']))->first();
        if ($existingRole) {
            return redirect()->back()->withErrors(['name' => 'Role with this name already exists.'])->withInput();
        }

        $attributes['name'] = Str::slug($attributes['display_name']);
        $role = $this->model->create($attributes);

        $role->permissions()->attach($attributes['permission_ids']);
        return $role;
    }

    public function updateRole($attributes = [], $id)
    {
        $result = $this->model->find($id);
        $attributes['name'] = Str::slug($attributes['display_name']);

        if ($result) {
            // Extract only the relevant attributes for the update
            $updateData = [
                'display_name' => $attributes['display_name'],
                'name' => $attributes['name'],
                // Add other attributes as needed
            ];

            // Use the update method with the extracted attributes
            $result->update($updateData);

            // Sync the permissions
            $result->permissions()->sync($attributes['permission_ids']);

            return $result;
        }
        return false;
    }
}

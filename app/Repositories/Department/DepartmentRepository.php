<?php

namespace App\Repositories\Department;

use App\Repositories\BaseRepository;
use App\Repositories\Department\DepartmentRepositoryInterface;
use Illuminate\Support\Str;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Department::class;
    }

    public function getDepartment()
    {
        return $this->model->select('Department_name')->take(5)->get();
    }

    public function insertDepartment($attributes = [])
    {
        // Implement your logic to insert a user here
        $existingDepartment = $this->model->where('name', $attributes['name'])->first();
        if ($existingDepartment) {
            return redirect()->back()->withErrors(['name' => 'Role with this name already exists.'])->withInput();
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $department = $this->model->create($attributes);
        //dd($department);

        return $department->toArray();
    }

    public function updateDepartment($attributes = [], $id)
    {
        // Implement your logic to update a user here
        $result = $this->model->find($id);
        $attributes['slug'] = Str::slug($attributes['name']);

        if ($result) {
            // Extract only the relevant attributes for the update
            $updateData = [
                'name' => $attributes['name'],
                'description' => $attributes['description'],
                'slug' => $attributes['slug'],
                // Add other attributes as needed
            ];

            // Use the update method with the extracted attributes
            $result->update($updateData);

            return $result;
        }
        return false;
    }
}

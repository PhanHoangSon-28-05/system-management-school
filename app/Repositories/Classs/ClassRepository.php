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
        $existingClass = $this->model->where('name', $attributes['name'])->first();
        if ($existingClass) {
            return redirect()->back()->withErrors(['name' => 'Class with this name already exists.'])->withInput();
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $class = $this->model->create($attributes);
        //dd($department);

        return $class->toArray();
    }

    public function updateClass($attributes = [], $id)
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

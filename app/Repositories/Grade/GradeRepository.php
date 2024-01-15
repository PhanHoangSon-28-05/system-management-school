<?php

namespace App\Repositories\Grade;

use App\Repositories\BaseRepository;
use App\Repositories\Grade\GradeRepositoryInterface;
use Illuminate\Support\Str;

class GradeRepository extends BaseRepository implements GradeRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Grade::class;
    }

    public function getGrade()
    {
        return $this->model->select('name')->take(5)->get();
    }
    public function getGradeToSlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
    public function insertGrade($attributes = [])
    {
        // Implement your logic to insert a user here
        $existingGrade = $this->model->where('name', $attributes['name'])->first();
        if ($existingGrade) {
            return redirect()->back()->withErrors(['name' => 'Grade with this name already exists.'])->withInput();
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $grade = $this->model->create($attributes);
        //dd($department);

        return $grade->toArray();
    }

    public function updateGrade($attributes = [], $id)
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

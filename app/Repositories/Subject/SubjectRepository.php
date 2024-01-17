<?php

namespace App\Repositories\Subject;

use App\Models\Detail_Teacher;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repositories\BaseRepository;
use App\Repositories\Subject\SubjectRepositoryInterface;
use Illuminate\Support\Str;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Subject::class;
    }

    public function getSubjectDepartment()
    {
        $subjects = $this->model->all();
        return $subjects;
    }

    public function getallSubjectToSlugTeacher($slug)
    {
        $teacher = Teacher::where('slug', $slug)->first();
        $allSubject = Detail_Teacher::where('teacher_id', $teacher->id)->get();

        return $allSubject;
    }
    public function getallSubject($id)
    {
        $allSubject = Detail_Teacher::where('teacher_id', $id)->pluck('subject_id')->unique()->toArray();

        return $allSubject;
    }

    public function getSubjectNotInGiveTeachet($allSubject)
    {
        $teacher = Subject::whereNotIn('id', function ($query) use ($allSubject) {
            $query->select('subject_id')
                ->from('detail__teachers')
                ->whereIn('subject_id', $allSubject);
        })->get();

        return $teacher;
    }

    public function insertSubject($attributes = [])
    {
        // Implement your logic to insert a user here
        $existingDepartment = $this->model->where('name', $attributes['name'])->first();
        if ($existingDepartment) {
            return redirect()->back()->withErrors(['name' => 'Subject with this name already exists.'])->withInput();
        }

        $attributes['slug'] = Str::slug($attributes['name']);
        $subject = $this->model->create($attributes);
        //dd($department);

        return $subject->toArray();
    }

    public function updateSubject($attributes = [], $id)
    {
        // Implement your logic to update a user here
        $result = $this->model->find($id);
        $attributes['slug'] = Str::slug($attributes['name']);

        if ($result) {
            // Extract only the relevant attributes for the update
            $updateData = [
                'name' => $attributes['name'],
                'credit_hours' => $attributes['credit_hours'],
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

<?php

namespace App\Repositories\Department\TeacherDepartment;

use App\Models\Department;
use App\Models\Teacher;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class TeacherDepartmentRepository extends BaseRepository implements TeacherDepartmentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Detail_Department::class;
    }

    public function indexTeacher_Department($slug)
    {
        $department = Department::where('slug', $slug)->first();

        if (!$department) {
        }
        $teachers_dep = $department->teachers;
        return $teachers_dep;
    }

    public function getAllTeacherIds()
    {
        $allTeacher = $this->model->where('teacher_id', '<>', 'null')->pluck('teacher_id')->toArray();

        return $allTeacher;
    }

    public function getTeachersNotInDepartment($allTeacherIds)
    {
        $teacher = Teacher::whereNotIn('id', function ($query) use ($allTeacherIds) {
            $query->select('teacher_id')
                ->from('detail__departments')
                ->whereIn('teacher_id', $allTeacherIds);
        })->get();

        return $teacher;
    }

    public function index_Department($slug)
    {
        $department = Department::where('slug', $slug)->first();


        return $department;
    }

    public function edit_Department($slug)
    {

        $department = Department::where('slug', '<>', $slug)->get();
        return $department;
    }

    public function updateTeacher_Department($id_Teacher, $attributes = [])
    {
        $department = $this->model->where('teacher_id', $id_Teacher)->first();

        // dd($department);

        if ($department) {
            $department->update($attributes);
            return $department;
        } else {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }
    }
}

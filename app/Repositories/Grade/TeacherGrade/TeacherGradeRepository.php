<?php

namespace App\Repositories\Grade\TeacherGrade;

use App\Models\Grade;
use App\Models\Teacher;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class TeacherGradeRepository extends BaseRepository implements TeacherGradeRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Detail_Class::class;
    }

    public function indexTeacher_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();

        if (!$grade) {
        }
        $Teachers_dep = $grade->Teachers;
        return $Teachers_dep;
    }

    public function getAllTeacherIds()
    {
        $allTeacher = $this->model->where('teacher_id', '<>', 'null')->pluck('Teacher_id')->toArray();

        return $allTeacher;
    }

    public function getTeachersNotInGrade($allTeacherIds)
    {
        $Teacher = Teacher::whereNotIn('id', function ($query) use ($allTeacherIds) {
            $query->select('teacher_id')
                ->from('detail__classes')
                ->whereIn('Teacher_id', $allTeacherIds);
        })->get();

        return $Teacher;
    }

    public function index_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();


        return $grade;
    }

    public function createTeacherGrade($all)
    {
        $grade = Grade::where('id', $all['grade_id'])->first();
        if ($all['status'] == 1) {
            $all['descriptons'] = 'Giáo viên chủ nhiệm của lớp ' . $grade->name;
        } else {
            $all['descriptons'] = 'Giáo viên bộ môn của lớp ' . $grade->name;
        }
        // dd($all);
        return $this->model->create($all);
    }


    public function edit_Grade($slug)
    {

        $grade = Grade::where('slug', '<>', $slug)->get();
        return $grade;
    }

    public function updateTeacher_Grade($id_Teacher, $attributes = [])
    {
        $grade = $this->model->where('teacher_id', $id_Teacher)->first();

        // dd($grade);

        if ($grade) {
            $grade->update($attributes);
            return $grade;
        } else {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }
    }
}

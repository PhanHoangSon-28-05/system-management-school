<?php

namespace App\Repositories\Grade\StudentGrade;

use App\Models\Grade;
use App\Models\Student;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class StudentGradeRepository extends BaseRepository implements StudentGradeRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Detail_Class::class;
    }

    public function indexStudent_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();

        if (!$grade) {
        }
        $students_dep = $grade->students;
        return $students_dep;
    }

    public function getAllstudentIds()
    {
        $allstudent = $this->model->where('student_id', '<>', 'null')->pluck('student_id')->toArray();

        return $allstudent;
    }

    public function getStudentsNotInGrade($allstudentIds)
    {
        $student = Student::whereNotIn('id', function ($query) use ($allstudentIds) {
            $query->select('student_id')
                ->from('detail__classes')
                ->whereIn('student_id', $allstudentIds);
        })->get();

        return $student;
    }

    public function index_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();

        return $grade;
    }

    public function createStudentGrade($all)
    {
        $grade = Grade::where('id', $all['grade_id'])->first();
        $all['descriptions'] = 'Sinh viên lớp ' . $grade->name;

        return $this->model->create($all);
    }


    public function edit_Grade($slug)
    {

        $grade = Grade::where('slug', '<>', $slug)->get();
        return $grade;
    }

    public function updatestudent_Grade($id_student, $attributes = [])
    {
        $grade = $this->model->where('student_id', $id_student)->first();

        // dd($grade);

        if ($grade) {
            $grade->update($attributes);
            return $grade;
        } else {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }
    }
}

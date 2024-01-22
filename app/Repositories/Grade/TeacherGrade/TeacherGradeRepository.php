<?php

namespace App\Repositories\Grade\TeacherGrade;

use App\Models\Detail_Class;
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
        // dd($Teachers_dep);
        return $Teachers_dep;
    }

    public function indexHomeroomTeacher_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();

        if (!$grade) {
            return [];
        }

        $Teachers_dep = $grade->detail_Class;

        if ($Teachers_dep) {
            $homeroomTeacher = $Teachers_dep->where('status', 1)->first();
            $dataHomeroomTeacher = $homeroomTeacher ? $homeroomTeacher->teachers : [];
            return $dataHomeroomTeacher;
        }
        return false;
    }

    public function getAllTeacherIds()
    {
        $allTeacher = $this->model->where('grade_id', '<>', 'null')->pluck('Teacher_id')->toArray();

        return $allTeacher;
    }

    public function getTeachersNotInGrade($allTeacherIds)
    {
        $Teacher = Teacher::whereNotIn('id', function ($query) use ($allTeacherIds) {
            $query->select('teacher_id')
                ->from('detail__classes')
                ->whereIn('Teacher_id', $allTeacherIds);
        })->get();
        // $Teacher = Teacher::all();
        return $Teacher;
    }

    public function index_Grade($slug)
    {
        $grade = Grade::where('slug', $slug)->first();

        return $grade;
    }

    public function checkHomeroomTeacher($slugGrade)
    {
        $grade = Grade::where('slug', $slugGrade)->first();
        $check = $this->model->where('grade_id', $grade->id)->where('status', '1')->first();
        // dd($check);
        if ($check == null) {
            return false;
        }

        return true;
    }

    public function createTeacherGrade($all)
    {
        $grade = Grade::where('id', $all['grade_id'])->first();
        $existingRecord = $this->model
            ->where('grade_id', $all['grade_id'])
            ->where('teacher_id', $all['teacher_id'])
            ->first();

        if ($existingRecord) {
            // If the record exists, update the descriptions and status
            $existingRecord->update([
                'descriptions' => ($all['status'] == 1) ? 'Giáo viên chủ nhiệm của lớp ' . $grade->name : 'Giáo viên bộ môn của lớp ' . $grade->name,
                'status' => $all['status'],
            ]);

            return $existingRecord;
        } else {
            // If the record does not exist, create a new one
            // $grade = Grade::where('id', $all['grade_id'])->first();
            $all['descriptions'] = ($all['status'] == 1) ? 'Giáo viên chủ nhiệm của lớp ' . $grade->name : 'Giáo viên bộ môn của lớp ' . $grade->name;

            return $this->model->create($all);
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

    public function deleteTeacherToSlugAndSlugGrade($slugGrade, $idTeacher)
    {
        $idGrade = Grade::where('slug', $slugGrade)->first()->id;
        $check = Detail_Class::where('grade_id', $idGrade)->where('teacher_id', $idTeacher)->first();
        dd($check);
        $check->delete();
        return $check;
    }
}

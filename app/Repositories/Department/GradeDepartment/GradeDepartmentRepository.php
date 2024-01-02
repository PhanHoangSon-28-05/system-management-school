<?php

namespace App\Repositories\Department\GradeDepartment;

use App\Models\Department;
use App\Models\Grade;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class gradeDepartmentRepository extends BaseRepository implements GradeDepartmentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Detail_Department::class;
    }

    public function indexGrade_Department($slug)
    {
        $department = Department::where('slug', $slug)->first();

        if (!$department) {
        }
        $grades_dep = $department->grades;
        return $grades_dep;
    }

    public function getAllGradeIds()
    {
        $allgrade = $this->model->where('grade_id', '<>', 'null')->pluck('grade_id')->toArray();
        // dd($allgrade);
        return $allgrade;
    }

    public function getGradesNotInDepartment($allgradeIds)
    {
        $grade = Grade::whereNotIn('id', function ($query) use ($allgradeIds) {
            $query->select('grade_id')
                ->from('detail__departments')
                ->whereIn('grade_id', $allgradeIds);
        })->get();

        return $grade;
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

    public function updateGrade_Department($id_grade, $attributes = [])
    {
        $department = $this->model->where('grade_id', $id_grade)->first();

        // dd($department);

        if ($department) {
            $department->update($attributes);
            return $department;
        } else {
            return response()->json(['message' => 'Không tìm thấy bản ghi'], 404);
        }
    }
}

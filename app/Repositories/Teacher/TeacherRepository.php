<?php

namespace App\Repositories\Teacher;

use App\Models\Detail_Class;
use App\Models\Detail_Teacher;
use App\Models\Grade;
use Intervention\Image\Facades\Image;


use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Teacher::class;
    }

    public function getAllTeacher()
    {
        return $this->model->paginate(9);
    }

    public function getTeacherToSlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function getTeacherToSlugAndSlugGrade($slugGrade, $idTeacher)
    {
        $idGrade = Grade::where('slug', $slugGrade)->first()->id;
        $check = Detail_Class::where('grade_id', $idGrade)->where('teacher_id', $idTeacher)->first();
        return $check;
    }



    public function findById(string $id)
    {
        return $this->model->find($id);
    }

    public function getSubjectTeacherToId($id)
    {
        return Detail_Teacher::where('teacher_id', $id)->get();
    }

    public function subjectGiveteacher($attributes = [], string $id)
    {
        $attributes['teacher_id'] = $id;
        // dd($attributes);
        $add = Detail_Teacher::create($attributes);
        return $add;
    }


    public function delete_subjectGiveteacher(string $id)
    {
        $subject = Detail_Teacher::find($id);

        if ($subject) {
            $subject->delete();

            return response()->json([
                'message' => 'Subject Give Teacher deleted successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Subject Give Teacher not found'
            ], 404);
        }
    }

    public function insertTeacher($attributes = [])
    {
        $slug_name =  Str::slug($attributes['last_name']) . '-' . Str::slug($attributes['first_name']);
        $attributes['slug'] = $slug_name;
        $attributes['code'] = 'TC' . rand(1111, 99999999999);

        $get_image_personal = $attributes['image_personal'];
        $path_persona = 'public/uploads/teachers/individual/';
        $get_name_image_personal = $get_image_personal->getClientOriginalName();
        $name_image_personal = current(explode('.', $get_name_image_personal));
        $new_image_personal =  strtolower($slug_name . '-' . $name_image_personal . rand(0, 1000) . '.' . $get_image_personal->getClientOriginalExtension());
        $get_image_personal->move($path_persona, $new_image_personal);
        $attributes['image_personal'] = $new_image_personal;


        $path_citizenIdentification_front = 'public/uploads/teachers/citizenIdentification/';
        $get_image_citizenIdentification_front = $attributes['image_citizenIdentification_front'];
        $get_name_image_citizenIdentification_front = $get_image_citizenIdentification_front->getClientOriginalName();
        $name_image_citizenIdentification_front = current(explode('.', $get_name_image_citizenIdentification_front));
        $new_image_citizenIdentification_front =  strtolower($slug_name . '-' . $name_image_citizenIdentification_front . rand(0, 1000) . '.' . $get_image_citizenIdentification_front->getClientOriginalExtension());
        $get_image_citizenIdentification_front->move($path_citizenIdentification_front, $new_image_citizenIdentification_front);
        $attributes['image_citizenIdentification_front'] = $new_image_citizenIdentification_front;

        $get_image_citizenIdentification_backside = $attributes['image_citizenIdentification_backside'];
        $get_name_image_citizenIdentification_backside = $get_image_citizenIdentification_backside->getClientOriginalName();
        $name_image_citizenIdentification_backside = current(explode('.', $get_name_image_citizenIdentification_backside));
        $new_image_citizenIdentification_backside =  strtolower($slug_name . '-' . $name_image_citizenIdentification_backside . rand(0, 99) . '.' . $get_image_citizenIdentification_backside->getClientOriginalExtension());
        $get_image_citizenIdentification_backside->move($path_citizenIdentification_front, $new_image_citizenIdentification_backside);
        $attributes['image_citizenIdentification_backside'] = $new_image_citizenIdentification_backside;


        return $this->model->create($attributes);
    }

    public function updateTeacher($attributes = [], $id)
    {
        $result = $this->find($id);
        if (!$result) {
            return false;
        }

        $slug_name =  Str::slug($attributes['last_name']) . '-' . Str::slug($attributes['first_name']);
        $attributes['slug'] = $slug_name;


        if (isset($attributes['image_personal'])) {
            $path_personal = 'public/uploads/teachers/individual/' . $result->image_personal;
            if (File::exists($path_personal)) {
                File::delete($path_personal);
            }
            $get_image_personal = $attributes['image_personal'];
            $path_persona = 'public/uploads/teachers/individual/';
            $get_name_image_personal = $get_image_personal->getClientOriginalName();
            $name_image_personal = current(explode('.', $get_name_image_personal));
            $new_image_personal =  strtolower($slug_name . '-' . $name_image_personal . rand(0, 1000) . '.' . $get_image_personal->getClientOriginalExtension());
            $get_image_personal->move($path_persona, $new_image_personal);
            $attributes['image_personal'] = $new_image_personal;
        }
        $path_citizenIdentification_front = 'public/uploads/teachers/citizenIdentification/';
        if (isset($attributes['image_citizenIdentification_front'])) {
            $path_front = 'public/uploads/teachers/citizenIdentification/' . $result->image_citizenIdentification_front;
            if (File::exists($path_front)) {
                File::delete($path_front);
            }
            $path_citizenIdentification_front = 'public/uploads/teachers/citizenIdentification/';
            $get_image_citizenIdentification_front = $attributes['image_citizenIdentification_front'];
            $get_name_image_citizenIdentification_front = $get_image_citizenIdentification_front->getClientOriginalName();
            $name_image_citizenIdentification_front = current(explode('.', $get_name_image_citizenIdentification_front));
            $new_image_citizenIdentification_front =  strtolower($slug_name . '-' . $name_image_citizenIdentification_front . rand(0, 1000) . '.' . $get_image_citizenIdentification_front->getClientOriginalExtension());
            $get_image_citizenIdentification_front->move($path_citizenIdentification_front, $new_image_citizenIdentification_front);
            $attributes['image_citizenIdentification_front'] = $new_image_citizenIdentification_front;
        }
        if (isset($attributes['image_citizenIdentification_backside'])) {
            $path_backside = 'public/uploads/teachers/citizenIdentification/' . $result->image_citizenIdentification_backside;
            if (File::exists($path_backside)) {
                File::delete($path_backside);
            }
            $get_image_citizenIdentification_backside = $attributes['image_citizenIdentification_backside'];
            $get_name_image_citizenIdentification_backside = $get_image_citizenIdentification_backside->getClientOriginalName();
            $name_image_citizenIdentification_backside = current(explode('.', $get_name_image_citizenIdentification_backside));
            $new_image_citizenIdentification_backside =  strtolower($slug_name . '-' . $name_image_citizenIdentification_backside . rand(0, 99) . '.' . $get_image_citizenIdentification_backside->getClientOriginalExtension());
            $get_image_citizenIdentification_backside->move($path_citizenIdentification_front, $new_image_citizenIdentification_backside);
            $attributes['image_citizenIdentification_backside'] = $new_image_citizenIdentification_backside;
        }
        $success = $result->update($attributes);

        // If update was successful, return the updated model; otherwise, return false
        return $success ? $result : false;
    }

    public function deleteTeacher($id)
    {
        $result = $this->find($id);
        if (!$result) {
            return false;
        }
        $path_personal = 'public/uploads/teachers/individual/' . $result->image_personal;
        if (File::exists($path_personal)) {
            File::delete($path_personal);
        }
        $path_front = 'public/uploads/teachers/citizenIdentification/' . $result->image_citizenIdentification_front;
        if (File::exists($path_front)) {
            File::delete($path_front);
        }
        $path_front = 'public/uploads/teachers/citizenIdentification/' . $result->image_citizenIdentification_front;
        if (File::exists($path_front)) {
            File::delete($path_front);
        }
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function checkAccountTeacher(string $id)
    {
        $check = $this->model->find($id);
        // dd($check->users->first());
        if ($check->users->first() == null) {
            return false;
        }

        return true;
    }
}

<?php

namespace App\Repositories\Teacher;


use Intervention\Image\Facades\Image;


use Illuminate\Http\UploadedFile;
use App\Repositories\BaseRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Teacher::class;
    }


    public function findById(string $id)
    {
        return $this->model->find($id);
    }

    public function insertTeacher($attributes = [])
    {
        $slug_name =  Str::slug($attributes['last_name']) . '-' . Str::slug($attributes['first_name']);
        $attributes['slug'] = $slug_name;
        $attributes['code'] = 'TC' . rand(1111, 999999999) . $attributes['numerical-order'];

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
}

<?php

namespace App\Repositories\User;

use App\Models\Student_User;
use App\Models\Teacher_User;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUser()
    {
        return $this->model->select('User_name')->take(5)->get();
    }

    public function insertUserTeacher($attributes = [], $idTeacher)
    {
        // dd(Teacher_User::all());
        $existingUser = $this->model->where('username', $attributes['username'])->first();
        if ($existingUser) {
            return response()->json(['error' => 'Username already exists'], 400);
        }

        $password = $attributes['password'];
        $attributes['password'] = Hash::make($password);
        $user = $this->model->create($attributes);
        $user->roles()->attach($attributes['role_ids']);

        $attributes['teacher_id'] = $idTeacher;
        $attributes['user_id'] = $user->id;
        // dd($idTeacher, $user->id);
        try {
            $add = Teacher_User::create($attributes);
            return $add;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $add;
    }

    public function insertUserStudent($attributes = [], $idStudent)
    {
        // dd($idStudent);
        $existingUser = $this->model->where('username', $attributes['username'])->first();
        if ($existingUser) {
            return response()->json(['error' => 'Username already exists'], 400);
        }

        $password = $attributes['password'];
        $attributes['password'] = Hash::make($password);
        $user = $this->model->create($attributes);
        $user->roles()->attach($attributes['role_ids']);

        $attributes['student_id'] = $idStudent;
        $attributes['user_id'] = $user->id;
        // dd($idStudent, $user->id);
        try {
            $add = Student_User::create($attributes);
            return $add;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $add;
    }

    public function editUser($id)
    {
        return $this->model->with('roles')->findOrFail($id);
    }

    public function updateUser($attributes = [], $id)
    {
        $user = $this->model->findOrFail($id);

        $user->update($attributes);

        $user->roles()->sync($attributes['role_ids']);
        return $user;
    }
}

<?php

namespace Database\Seeders\Admin;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [];

        for ($i = 1; $i <= 120; $i++) {
            $teachers[] = [
                'code' => 'TC' . rand(1111, 999999999) . $i,
                'image_personal' => 'teacher_image_' . $i,
                'image_citizenIdentification_front' => 'front_image_' . $i,
                'image_citizenIdentification_backside' => 'backside_image_' . $i,
                'last_name' => 'Lastname' . $i,
                'first_name' => 'Firstname' . $i,
                'birthday' => '23/3/1980',
                'gender' => ($i % 2 == 0) ? 'male' : 'female',
                'email' => 'teacher' . $i . '@school.com',
                'phone' => '0101993993',
                'hometown' => 'Hometown' . $i,
                'slug' => 'teacher' . $i,
            ];
        }

        foreach ($teachers as $teacher) {
            Teacher::updateOrCreate($teacher);

            $teacherModel = Teacher::where('code', $teacher['code'])->first();
            $departmentIds = Department::pluck('id')->random(2);
            $teacherModel->detail__departments()->sync($departmentIds);
        }
    }
}

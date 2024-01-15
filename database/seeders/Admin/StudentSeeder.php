<?php

namespace Database\Seeders\Admin;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [];

        for ($i = 1; $i <= 120; $i++) {
            $students[] = [
                'code' => 'SV' . rand(1111, 999999999) . $i,
                'image_personal' => 'teacher_image_' . $i,
                'image_citizenIdentification_front' => 'front_image_' . $i,
                'image_citizenIdentification_backside' => 'backside_image_' . $i,
                'last_name' => 'Lastname' . $i,
                'first_name' => 'Firstname' . $i,
                'birthday' => '23/3/1999',
                'gender' => ($i % 2 == 0) ? 'male' : 'female',
                'email' => 'sv' . $i . '@gmail.com',
                'phone' => '0101993993',
                'hometown' => 'Da Nang',
                'slug' => 'sv' . $i,
            ];
        }

        foreach ($students as $student) {
            $studentModel = Student::updateOrCreate($student);

            $gradeIds = Grade::pluck('id')->random(2);

            $pivotData = [];
            foreach ($gradeIds as $gradeId) {
                $grade = Grade::find($gradeId);
                $pivotData[$gradeId] = ['descriptions' => 'Sinh viên lớp ' . $grade->name];
            }

            $studentModel->detail__class()->sync($pivotData);
        }
    }
}

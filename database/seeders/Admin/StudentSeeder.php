<?php

namespace Database\Seeders\Admin;

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
        //
        $students =
            [
                [
                    'code' => '12334456',
                    'image_personal' => 'defaultimage1.jpg',
                    'image_citizenIdentification' => 'defaultimage3.jpg',
                    'name' => 'Sinh viên 1',
                    'birthday' => '23/3/1999',
                    'gender' => 'male',
                    'email' => 'sv1@gmail.com',
                    'phone' => '0101993993',
                    'hometown' => 'Da Nang',
                    'slug' => 'sv1',
                    'user_id' => 4,
                ],
                [
                    'code' => '12334536',
                    'image_personal' => 'defaultimage2.jpg',
                    'image_citizenIdentification' => 'defaultimage4.jpg',
                    'name' => 'Sinh viên 2',
                    'birthday' => '12/2/1999',
                    'gender' => 'female',
                    'email' => 'sv2@gmail.com',
                    'phone' => '0933033033',
                    'hometown' => 'Hue',
                    'slug' => 'sv2',
                    'user_id' => 5,
                ], [
                    'code' => '123345456',
                    'image_personal' => 'defaultimage5.jpg',
                    'image_citizenIdentification' => 'defaultimage6.jpg',
                    'name' => 'Sinh viên 3',
                    'birthday' => '12/3/1999',
                    'gender' => 'female',
                    'email' => 'sv3@gmail.com',
                    'phone' => '0987987987',
                    'hometown' => 'Quang Nam',
                    'slug' => 'sv3',
                    'user_id' => 6,
                ],
            ];

        foreach ($students as $student) {
            Student::updateOrCreate($student);
        }
    }
}

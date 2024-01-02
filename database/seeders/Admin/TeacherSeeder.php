<?php

namespace Database\Seeders\Admin;

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
        $teachers =
            [
                [
                    'code' => '746456456',
                    'image_personal' => 'default_image1.jpg',
                    'image_citizenIdentification' => 'default_image3.jpg',
                    'name' => 'Tên giáo viên 1',
                    'birthday' => '23/3/1999',
                    'gender' => 'male',
                    'email' => 'gv1@gmail.com',
                    'phone' => '0944944944',
                    'hometown' => 'Da Nang',
                    'slug' => 'gv1',
                ],
                [
                    'code' => '7464534536',
                    'image_personal' => 'default_image2.jpg',
                    'image_citizenIdentification' => 'default_image4.jpg',
                    'name' => 'Tên giáo viên 2',
                    'birthday' => '12/2/1999',
                    'gender' => 'female',
                    'email' => 'gv2@gmail.com',
                    'phone' => '0933939393',
                    'hometown' => 'Hue',
                    'slug' => 'gv2',
                ], [
                    'code' => '24347845456',
                    'image_personal' => 'default_image5.jpg',
                    'image_citizenIdentification' => 'default_image6.jpg',
                    'name' => 'Tên giáo viên 3',
                    'birthday' => '12/1/1999',
                    'gender' => 'female',
                    'email' => 'gv3@gmail.com',
                    'phone' => '0955955955',
                    'hometown' => 'Quang Nam',
                    'slug' => 'gv3',
                ],
            ];

        foreach ($teachers as $teacher) {
            Teacher::updateOrCreate($teacher);
        }
    }
}

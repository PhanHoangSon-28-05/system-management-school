<?php

namespace Database\Seeders\Admin;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $classes =
            [
                ['name' => 'CNTT1-21', 'description' => 'Công nghệ thông tin 1-21', 'slug' => 'cong-nghe-thong-tin-1-21'],
                ['name' => 'CNTT2-21', 'description' => 'Công nghệ thông tin 2-21', 'slug' => 'cong-nghe-thong-tin-2-21'],
                ['name' => 'TATM1-21', 'description' => 'Tiếng anh thương mại 1-21', 'slug' => 'tieng-anh-thong-mai-1-21'],
                ['name' => 'TATM2-21', 'description' => 'Tiếng anh thương mại 2-21', 'slug' => 'tieng-anh-thong-mai-2-21'],
                ['name' => 'MAR1-21', 'description' => 'Marketing 1-21', 'slug' => 'marketing-1-21'],
                ['name' => 'MAR2-21', 'description' => 'Marketing 2-21', 'slug' => 'marketing-2-21'],
            ];

        foreach ($classes as $class) {
            Grade::updateOrCreate($class);
        }
    }
}

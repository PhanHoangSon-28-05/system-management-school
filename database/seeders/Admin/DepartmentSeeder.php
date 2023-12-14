<?php

namespace Database\Seeders\Admin;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments =
            [
                ['name' => 'Department of foreign language information technology', 'description' => 'Khoa tin học ngoại ngữ', 'slug' => 'tin-hoc-ngoai-ngu'],
                ['name' => 'Accounting department', 'description' => 'Khoa kế toán', 'slug' => 'ke-toan'],
                ['name' => 'Tourism English Department', 'description' => 'Khoa tiếng anh du lịch', 'slug' => 'tieng-anh-du-lich'],
            ];

        foreach ($departments as $department) {
            Department::updateOrCreate($department);
        }
    }
}

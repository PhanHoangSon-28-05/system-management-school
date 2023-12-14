<?php

namespace Database\Seeders\Admin;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects =
            [
                ['name' => 'C# Programming', 'credit_hours' => '3', 'description' => 'Lập trình C#', 'slug' => 'C#-programming'],
                ['name' => 'System design analysis', 'credit_hours' => '4', 'description' => 'Phân tích thiết kế hệ thống', 'slug' => 'system-design-analysis'],
                ['name' => 'Database', 'credit_hours' => '5', 'description' => 'Cơ dỡ dữ liệu', 'slug' => 'database'],
                ['name' => 'Basic English', 'credit_hours' => '2', 'description' => 'Tiếng anh cơ bản', 'slug' => 'basic-english'],

            ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate($subject);
        }
    }
}

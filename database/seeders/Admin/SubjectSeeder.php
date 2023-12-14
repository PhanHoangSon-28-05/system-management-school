<?php

namespace Database\Seeders\admin;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Anh văn cơ bản 1', 'credit_hours' => '2', 'description' => 'Học và lấy lại kiến thức cơ bản tiếng anh của các thì'],
            ['name' => 'Giáo dục chính trị', 'credit_hours' => '2', 'description' => 'Học các hiểu biết về chính trị của xã hội'],
            ['name' => 'Giáo dục thể chất', 'credit_hours' => '2', 'description' => 'Học rèn luyện sức khỏe cho bản thân'],
            ['name' => 'Tin học', 'credit_hours' => '2', 'description' => 'Học cách làm Word, Execl, PowerPoint'],
            ['name' => 'Pháp luật', 'credit_hours' => '2', 'description' => 'Học các luật lệ của quốc gia hiện nay'],
            ['name' => 'Anh văn cơ bản 2', 'credit_hours' => '2', 'description' => 'Học và lấy lại kiến thức cơ bản, cách viết đoạn văn và giao tiếp bằng tiếng anh'],
            ['name' => 'Cơ sở dữ liệu', 'credit_hours' => '2', 'description' => 'Làm quên với cơ sở dữ liệu và hiểu cách hoạt động của nó'],
            ['name' => 'C# Programming', 'credit_hours' => '3', 'description' => 'Lập trình C#', 'slug' => 'C#-programming'],
            ['name' => 'System design analysis', 'credit_hours' => '4', 'description' => 'Phân tích thiết kế hệ thống', 'slug' => 'system-design-analysis'],
            ['name' => 'Database', 'credit_hours' => '5', 'description' => 'Cơ dỡ dữ liệu', 'slug' => 'database'],
            ['name' => 'Basic English', 'credit_hours' => '2', 'description' => 'Tiếng anh cơ bản', 'slug' => 'basic-english'],
        ];

        foreach ($subjects as $value) {
            Subject::updateOrCreate($value);
        }
    }
}

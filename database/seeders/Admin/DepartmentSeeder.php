<?php

namespace Database\Seeders\Admin;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departments = [
            [
                'name' => 'Khoa Đào tạo và BDCD',
                'description' => 'Phòng ban trong Trường Cao đẳng Kinh tế Kế hoạch',
                'slug' => 'khoa-dao-tao-va-bdcd'
            ],
            [
                'name' => 'Khoa Kế hạch và Quản trị',
                'description' => 'Đào tạo và nghiên cứu về quản lý kế hoạch và quản trị trong giáo dục đại học và tổ chức.',
                'slug' => 'khoa-ke-hoach-va-quan-tri'
            ],
            [
                'name' => 'Khoa Kế toán',
                'description' => 'Đào tạo và nghiên cứu về các nguyên tắc, phương pháp và quy trình liên quan đến lĩnh vực Kế toán trong giáo dục đại học và tổ chức, bao gồm quản lý tài chính, phân tích tài chính, kiểm toán, quản lý chi phí và công tác thuế.',
                'slug' => 'khoa-ke-toan'
            ],
            [
                'name' => 'Khoa Kinh tế cơ sở',
                'description' => 'Đào tạo và nghiên cứu về nguyên lý và quản lý kinh tế trong giáo dục đại học và tổ chức',
                'slug' => 'khoa-kinh-te-co-so'
            ],
            [
                'name' => 'Khoa Tin học và Ngoại ngữ',
                'description' => 'Đào tạo và nghiên cứu về Tin học và các ngôn ngữ ngoại ngữ trong giáo dục đại học và tổ chức',
                'slug' => 'khoa-tin-học-va-ngoai-ngu'
            ],
            [
                'name' => 'Department of foreign language information technology',
                'description' => 'Khoa tin học ngoại ngữ',
                'slug' => 'tin-hoc-ngoai-ngu'
            ],
            [
                'name' => 'Accounting department',
                'description' => 'Khoa kế toán',
                'slug' => 'ke-toan'
            ],
            [
                'name' => 'Tourism English Department',
                'description' => 'Khoa tiếng anh du lịch',
                'slug' => 'tieng-anh-du-lich'
            ],
        ];

        foreach ($departments as $value) {
            Department::updateOrCreate($value);
        }
    }
}

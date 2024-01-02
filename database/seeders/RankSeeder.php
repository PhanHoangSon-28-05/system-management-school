<?php

namespace Database\Seeders;

use App\Models\Rank_Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranks = [
            ['name' => 'Thứ 2', 'slug' => 'thu-2'],
            ['name' => 'Thứ 3', 'slug' => 'thu-3'],
            ['name' => 'Thứ 4', 'slug' => 'thu-4'],
            ['name' => 'Thứ 5', 'slug' => 'thu-5'],
            ['name' => 'Thứ 6', 'slug' => 'thu-6'],
            ['name' => 'Thứ 7', 'slug' => 'thu-7'],
            ['name' => 'Chủ Nhật', 'slug' => 'chu-nhat'],
        ];

        foreach ($ranks as $value) {
            Rank_Schedule::updateOrCreate($value);
        }
    }
}

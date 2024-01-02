<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            ['name' => 'Tiết 1', 'time' => '7:00 -> 7:50', 'slug' => 'tiet-1'],
            ['name' => 'Tiết 2', 'time' => '7:55 -> 8:45', 'slug' => 'tiet-2'],
            ['name' => 'Tiết 3', 'time' => '8:50 -> 9:40', 'slug' => 'tiet-3'],
            ['name' => 'Tiết 4', 'time' => '9:45 -> 10:35', 'slug' => 'tiet-4'],
            ['name' => 'Tiết 5', 'time' => '10:40 -> 11:30', 'slug' => 'tiet-5'],
            ['name' => 'Tiết 6', 'time' => '12:30 -> 13:20', 'slug' => 'tiet-6'],
            ['name' => 'Tiết 7', 'time' => '13:25 -> 14:15', 'slug' => 'tiet-7'],
            ['name' => 'Tiết 8', 'time' => '14:20 -> 15:10', 'slug' => 'tiet-8'],
            ['name' => 'Tiết 9', 'time' => '15:15 -> 16:05', 'slug' => 'tiet-9'],
            ['name' => 'Tiết 10', 'time' => '16:10 -> 17:00', 'slug' => 'tiet-10'],
        ];

        foreach ($periods as $value) {
            Period::updateOrCreate($value);
        }
    }
}

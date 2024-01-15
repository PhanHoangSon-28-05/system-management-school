<?php

namespace Database\Seeders\Admin;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [];

        for ($floor = 1; $floor <= 7; $floor++) {
            for ($roomNumber = 1; $roomNumber <= 10; $roomNumber++) {
                $room = [
                    'name' => 'P' . ($floor * 100 + $roomNumber),
                    'description' => "Phòng số {$roomNumber} ở tầng {$floor}",
                    'slug' => 'p' . ($floor * 100 + $roomNumber),
                ];

                $rooms[] = $room;
            }
        }

        foreach ($rooms as $value) {
            Room::updateOrCreate($value);
        }
    }
}

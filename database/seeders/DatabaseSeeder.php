<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\Permisson;
use Database\Seeders\Admin\PermissionSeeder;
use Database\Seeders\Admin\RoleDataSeeder;
use Database\Seeders\Admin\TeacherSeeder;
use Database\Seeders\Admin\DepartmentSeeder;
use Database\Seeders\Admin\ClassSeeder;
use Database\Seeders\Admin\RoomSeeder;
use Database\Seeders\Admin\StudentSeeder;
use Database\Seeders\Admin\SubjectSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(RoleDataSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(UserSeederSuperAdmin::class);
        // $this->call(TeacherSeeder::class);
        // $this->call(DepartmentSeeder::class);
        // $this->call(ClassSeeder::class);
        // $this->call(SubjectSeeder::class);
        $this->call(StudentSeeder::class);
        // $this->call(RoomSeeder::class);
    }
}

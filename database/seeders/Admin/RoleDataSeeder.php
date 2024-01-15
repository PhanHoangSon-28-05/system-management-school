<?php

namespace Database\Seeders\Admin;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles =
            [
                ['name' => 'super-admin', 'display_name' => 'Super admin', 'description' => 'software owner', 'group' => 'system'],
                ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'software management', 'group' => 'system'],
                ['name' => 'teacher', 'display_name' => 'Teacher', 'description' => 'teacher', 'group' => 'clinet'],
                ['name' => 'student', 'display_name' => 'Student', 'description' => 'student', 'group' => 'clinet'],
            ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }
    }
}

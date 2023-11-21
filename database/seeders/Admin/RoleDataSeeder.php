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
                ['name' => 'Super admin', 'slug' => 'super-admin', 'description' => 'software owner', 'group' => 'system'],
                ['name' => 'Admin', 'slug' => 'admin', 'description' => 'software management', 'group' => 'system'],
                ['name' => 'Teacher', 'slug' => 'teacher', 'description' => 'teacher', 'group' => 'clinet'],
                ['name' => 'Student', 'slug' => 'student', 'description' => 'student', 'group' => 'clinet'],
            ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }
    }
}

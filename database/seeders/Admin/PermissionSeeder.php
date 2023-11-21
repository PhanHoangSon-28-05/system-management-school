<?php

namespace Database\Seeders\Admin;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =
            [
                ['name' => 'Create Role', 'slug' => 'create-role', 'description' => 'Establish a new role', 'group' => 'Role'],
                ['name' => 'Update Role', 'slug' => 'update-role', 'description' => 'Modify and update the role', 'group' => 'Role'],
                ['name' => 'Show Role', 'slug' => 'show-role', 'description' => 'View role', 'group' => 'Role'],
                ['name' => 'Delete Role', 'slug' => 'delete-role', 'description' => 'Delete role', 'group' => 'Role'],

                ['name' => 'Create User', 'slug' => 'create-User', 'description' => 'Establish a new User', 'group' => 'User'],
                ['name' => 'Update User', 'slug' => 'update-User', 'description' => 'Modify and update the User', 'group' => 'User'],
                ['name' => 'Show User', 'slug' => 'show-User', 'description' => 'View User', 'group' => 'User'],
                ['name' => 'Delete User', 'slug' => 'delete-User', 'description' => 'Delete User', 'group' => 'User'],
            ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}

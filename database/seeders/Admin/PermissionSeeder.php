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

                ['name' => 'Create Teacher', 'slug' => 'create-Teacher', 'description' => 'Establish a new Teacher', 'group' => 'Teacher'],
                ['name' => 'Update Teacher', 'slug' => 'update-Teacher', 'description' => 'Modify and update the Teacher', 'group' => 'Teacher'],
                ['name' => 'Show Teacher', 'slug' => 'show-Teacher', 'description' => 'View Teacher', 'group' => 'Teacher'],
                ['name' => 'Delete Teacher', 'slug' => 'delete-Teacher', 'description' => 'Delete Teacher', 'group' => 'Teacher'],

                ['name' => 'Create Department', 'slug' => 'create-Department', 'description' => 'Establish a new Department', 'group' => 'Department'],
                ['name' => 'Update Department', 'slug' => 'update-Department', 'description' => 'Modify and update the Department', 'group' => 'Department'],
                ['name' => 'Show Department', 'slug' => 'show-Department', 'description' => 'View Department', 'group' => 'Department'],
                ['name' => 'Delete Department', 'slug' => 'delete-Department', 'description' => 'Delete Department', 'group' => 'Department'],

                ['name' => 'Create Student', 'slug' => 'create-Student', 'description' => 'Establish a new Student', 'group' => 'Student'],
                ['name' => 'Update Student', 'slug' => 'update-Student', 'description' => 'Modify and update the Student', 'group' => 'Student'],
                ['name' => 'Show Student', 'slug' => 'show-Student', 'description' => 'View Student', 'group' => 'Student'],
                ['name' => 'Delete Student', 'slug' => 'delete-Student', 'description' => 'Delete Student', 'group' => 'Student'],

                ['name' => 'Create Class', 'slug' => 'create-Class', 'description' => 'Establish a new Class', 'group' => 'Class'],
                ['name' => 'Update Class', 'slug' => 'update-Class', 'description' => 'Modify and update the Class', 'group' => 'Class'],
                ['name' => 'Show Class', 'slug' => 'show-Class', 'description' => 'View Class', 'group' => 'Class'],
                ['name' => 'Delete Class', 'slug' => 'delete-Class', 'description' => 'Delete Class', 'group' => 'Class'],

                ['name' => 'Create Subject', 'slug' => 'create-Subject', 'description' => 'Establish a new Subject', 'group' => 'Subject'],
                ['name' => 'Update Subject', 'slug' => 'update-Subject', 'description' => 'Modify and update the Subject', 'group' => 'Subject'],
                ['name' => 'Show Subject', 'slug' => 'show-Subject', 'description' => 'View Subject', 'group' => 'Subject'],
                ['name' => 'Delete Subject', 'slug' => 'delete-Subject', 'description' => 'Delete Subject', 'group' => 'Subject'],

                ['name' => 'Create Room', 'slug' => 'create-Room', 'description' => 'Establish a new Room', 'group' => 'Room'],
                ['name' => 'Update Room', 'slug' => 'update-Room', 'description' => 'Modify and update the Room', 'group' => 'Room'],
                ['name' => 'Show Room', 'slug' => 'show-Room', 'description' => 'View Room', 'group' => 'Room'],
                ['name' => 'Delete Room', 'slug' => 'delete-Room', 'description' => 'Delete Room', 'group' => 'Room'],

                ['name' => 'Create Schedule', 'slug' => 'create-Schedule', 'description' => 'Establish a new Schedule', 'group' => 'Schedule'],
                ['name' => 'Update Schedule', 'slug' => 'update-Schedule', 'description' => 'Modify and update the Schedule', 'group' => 'Schedule'],
                ['name' => 'Show Schedule', 'slug' => 'show-Schedule', 'description' => 'View Schedule', 'group' => 'Schedule'],
                ['name' => 'Delete Schedule', 'slug' => 'delete-Schedule', 'description' => 'Delete Schedule', 'group' => 'Schedule'],

                ['name' => 'Create Attendance', 'slug' => 'create-Attendance', 'description' => 'Establish a new Attendance', 'group' => 'Attendance'],
                ['name' => 'Update Attendance', 'slug' => 'update-Attendance', 'description' => 'Modify and update the Attendance', 'group' => 'Attendance'],
                ['name' => 'Show Attendance', 'slug' => 'show-Attendance', 'description' => 'View Attendance', 'group' => 'Attendance'],
                ['name' => 'Delete Attendance', 'slug' => 'delete-Attendance', 'description' => 'Delete Attendance', 'group' => 'Attendance'],

                ['name' => 'Create Score', 'slug' => 'create-Score', 'description' => 'Establish a new Score', 'group' => 'Score'],
                ['name' => 'Update Score', 'slug' => 'update-Score', 'description' => 'Modify and update the Score', 'group' => 'Score'],
                ['name' => 'Show Score', 'slug' => 'show-Score', 'description' => 'View Score', 'group' => 'Score'],
                ['name' => 'Delete Score', 'slug' => 'delete-Score', 'description' => 'Delete Score', 'group' => 'Score'],
            ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}

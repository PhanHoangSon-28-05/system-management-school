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

                ['name' => 'Create User', 'slug' => 'create-user', 'description' => 'Establish a new User', 'group' => 'User'],
                ['name' => 'Update User', 'slug' => 'update-user', 'description' => 'Modify and update the User', 'group' => 'User'],
                ['name' => 'Show User', 'slug' => 'show-user', 'description' => 'View User', 'group' => 'User'],
                ['name' => 'Delete User', 'slug' => 'delete-user', 'description' => 'Delete User', 'group' => 'User'],

                ['name' => 'Create Teacher', 'slug' => 'create-teacher', 'description' => 'Establish a new Teacher', 'group' => 'Teacher'],
                ['name' => 'Update Teacher', 'slug' => 'update-teacher', 'description' => 'Modify and update the Teacher', 'group' => 'Teacher'],
                ['name' => 'Show Teacher', 'slug' => 'show-teacher', 'description' => 'View Teacher', 'group' => 'Teacher'],
                ['name' => 'Delete Teacher', 'slug' => 'delete-teacher', 'description' => 'Delete Teacher', 'group' => 'Teacher'],

                ['name' => 'Create Department', 'slug' => 'create-department', 'description' => 'Establish a new Department', 'group' => 'Department'],
                ['name' => 'Update Department', 'slug' => 'update-department', 'description' => 'Modify and update the Department', 'group' => 'Department'],
                ['name' => 'Show Department', 'slug' => 'show-department', 'description' => 'View Department', 'group' => 'Department'],
                ['name' => 'Delete Department', 'slug' => 'delete-department', 'description' => 'Delete Department', 'group' => 'Department'],

                ['name' => 'Create Student', 'slug' => 'create-student', 'description' => 'Establish a new Student', 'group' => 'Student'],
                ['name' => 'Update Student', 'slug' => 'update-student', 'description' => 'Modify and update the Student', 'group' => 'Student'],
                ['name' => 'Show Student', 'slug' => 'show-student', 'description' => 'View Student', 'group' => 'Student'],
                ['name' => 'Delete Student', 'slug' => 'delete-student', 'description' => 'Delete Student', 'group' => 'Student'],

                ['name' => 'Create Class', 'slug' => 'create-class', 'description' => 'Establish a new Class', 'group' => 'Class'],
                ['name' => 'Update Class', 'slug' => 'update-class', 'description' => 'Modify and update the Class', 'group' => 'Class'],
                ['name' => 'Show Class', 'slug' => 'show-class', 'description' => 'View Class', 'group' => 'Class'],
                ['name' => 'Delete Class', 'slug' => 'delete-class', 'description' => 'Delete Class', 'group' => 'Class'],

                ['name' => 'Create Subject', 'slug' => 'create-subject', 'description' => 'Establish a new Subject', 'group' => 'Subject'],
                ['name' => 'Update Subject', 'slug' => 'update-subject', 'description' => 'Modify and update the Subject', 'group' => 'Subject'],
                ['name' => 'Show Subject', 'slug' => 'show-subject', 'description' => 'View Subject', 'group' => 'Subject'],
                ['name' => 'Delete Subject', 'slug' => 'delete-subject', 'description' => 'Delete Subject', 'group' => 'Subject'],

                ['name' => 'Create Room', 'slug' => 'create-room', 'description' => 'Establish a new Room', 'group' => 'Room'],
                ['name' => 'Update Room', 'slug' => 'update-room', 'description' => 'Modify and update the Room', 'group' => 'Room'],
                ['name' => 'Show Room', 'slug' => 'show-room', 'description' => 'View Room', 'group' => 'Room'],
                ['name' => 'Delete Room', 'slug' => 'delete-room', 'description' => 'Delete Room', 'group' => 'Room'],

                ['name' => 'Create Schedule', 'slug' => 'create-schedule', 'description' => 'Establish a new Schedule', 'group' => 'Schedule'],
                ['name' => 'Update Schedule', 'slug' => 'update-schedule', 'description' => 'Modify and update the Schedule', 'group' => 'Schedule'],
                ['name' => 'Show Schedule', 'slug' => 'show-schedule', 'description' => 'View Schedule', 'group' => 'Schedule'],
                ['name' => 'Delete Schedule', 'slug' => 'delete-schedule', 'description' => 'Delete Schedule', 'group' => 'Schedule'],

                ['name' => 'Create Attendance', 'slug' => 'create-attendance', 'description' => 'Establish a new Attendance', 'group' => 'Attendance'],
                ['name' => 'Update Attendance', 'slug' => 'update-attendance', 'description' => 'Modify and update the Attendance', 'group' => 'Attendance'],
                ['name' => 'Show Attendance', 'slug' => 'show-attendance', 'description' => 'View Attendance', 'group' => 'Attendance'],
                ['name' => 'Delete Attendance', 'slug' => 'delete-attendance', 'description' => 'Delete Attendance', 'group' => 'Attendance'],

                ['name' => 'Create Score', 'slug' => 'create-score', 'description' => 'Establish a new Score', 'group' => 'Score'],
                ['name' => 'Update Score', 'slug' => 'update-score', 'description' => 'Modify and update the Score', 'group' => 'Score'],
                ['name' => 'Show Score', 'slug' => 'show-score', 'description' => 'View Score', 'group' => 'Score'],
                ['name' => 'Delete Score', 'slug' => 'delete-score', 'description' => 'Delete Score', 'group' => 'Score'],
            ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}

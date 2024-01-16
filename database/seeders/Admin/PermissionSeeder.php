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
        $permissions = [
            ['name' => 'create-role', 'display_name' => 'Create Role', 'description' => 'Establish a new role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'description' => 'Modify and update the role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'description' => 'View role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'description' => 'Delete role', 'group' => 'Role'],

            ['name' => 'create-user', 'display_name' => 'Create User', 'description' => 'Establish a new User', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update User', 'description' => 'Modify and update the User', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show User', 'description' => 'View User', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete User', 'description' => 'Delete User', 'group' => 'User'],

            ['name' => 'create-teacher', 'display_name' => 'Create Teacher', 'description' => 'Establish a new Teacher', 'group' => 'Teacher'],
            ['name' => 'update-teacher', 'display_name' => 'Update Teacher', 'description' => 'Modify and update the Teacher', 'group' => 'Teacher'],
            ['name' => 'show-teacher', 'display_name' => 'Show Teacher', 'description' => 'View Teacher', 'group' => 'Teacher'],
            ['name' => 'delete-teacher', 'display_name' => 'Delete Teacher', 'description' => 'Delete Teacher', 'group' => 'Teacher'],
            ['name' => 'create-usera-teacher', 'display_name' => 'Create User Teacher', 'description' => 'Establish a new User of Teacher', 'group' => 'Teacher'],

            ['name' => 'create-department', 'display_name' => 'Create Department', 'description' => 'Establish a new Department', 'group' => 'Department'],
            ['name' => 'update-department', 'display_name' => 'Update Department', 'description' => 'Modify and update the Department', 'group' => 'Department'],
            ['name' => 'show-department', 'display_name' => 'Show Department', 'description' => 'View Department', 'group' => 'Department'],
            ['name' => 'delete-department', 'display_name' => 'Delete Department', 'description' => 'Delete Department', 'group' => 'Department'],

            ['name' => 'create-student', 'display_name' => 'Create Student', 'description' => 'Establish a new Student', 'group' => 'Student'],
            ['name' => 'update-student', 'display_name' => 'Update Student', 'description' => 'Modify and update the Student', 'group' => 'Student'],
            ['name' => 'show-student', 'display_name' => 'Show Student', 'description' => 'View Student', 'group' => 'Student'],
            ['name' => 'delete-student', 'display_name' => 'Delete Student', 'description' => 'Delete Student', 'group' => 'Student'],
            ['name' => 'create-usera-student', 'display_name' => 'Create User Student', 'description' => 'Establish a new User of Student', 'group' => 'Student'],

            ['name' => 'create-class', 'display_name' => 'Create Class', 'description' => 'Establish a new Class', 'group' => 'Class'],
            ['name' => 'update-class', 'display_name' => 'Update Class', 'description' => 'Modify and update the Class', 'group' => 'Class'],
            ['name' => 'show-class', 'display_name' => 'Show Class', 'description' => 'View Class', 'group' => 'Class'],
            ['name' => 'delete-class', 'display_name' => 'Delete Class', 'description' => 'Delete Class', 'group' => 'Class'],

            ['name' => 'create-subject', 'display_name' => 'Create Subject', 'description' => 'Establish a new Subject', 'group' => 'Subject'],
            ['name' => 'update-subject', 'display_name' => 'Update Subject', 'description' => 'Modify and update the Subject', 'group' => 'Subject'],
            ['name' => 'show-subject', 'display_name' => 'Show Subject', 'description' => 'View Subject', 'group' => 'Subject'],
            ['name' => 'delete-subject', 'display_name' => 'Delete Subject', 'description' => 'Delete Subject', 'group' => 'Subject'],

            ['name' => 'create-room', 'display_name' => 'Create Room', 'description' => 'Establish a new Room', 'group' => 'Room'],
            ['name' => 'update-room', 'display_name' => 'Update Room', 'description' => 'Modify and update the Room', 'group' => 'Room'],
            ['name' => 'show-room', 'display_name' => 'Show Room', 'description' => 'View Room', 'group' => 'Room'],
            ['name' => 'delete-room', 'display_name' => 'Delete Room', 'description' => 'Delete Room', 'group' => 'Room'],

            ['name' => 'create-schedule', 'display_name' => 'Create Schedule', 'description' => 'Establish a new Schedule', 'group' => 'Schedule'],
            ['name' => 'update-schedule', 'display_name' => 'Update Schedule', 'description' => 'Modify and update the Schedule', 'group' => 'Schedule'],
            ['name' => 'show-schedule', 'display_name' => 'Show Schedule', 'description' => 'View Schedule', 'group' => 'Schedule'],
            ['name' => 'delete-schedule', 'display_name' => 'Delete Schedule', 'description' => 'Delete Schedule', 'group' => 'Schedule'],

            ['name' => 'create-attendance', 'display_name' => 'Create Attendance', 'description' => 'Establish a new Attendance', 'group' => 'Attendance'],
            ['name' => 'update-attendance', 'display_name' => 'Update Attendance', 'description' => 'Modify and update the Attendance', 'group' => 'Attendance'],
            ['name' => 'show-attendance', 'display_name' => 'Show Attendance', 'description' => 'View Attendance', 'group' => 'Attendance'],
            ['name' => 'delete-attendance', 'display_name' => 'Delete Attendance', 'description' => 'Delete Attendance', 'group' => 'Attendance'],

            ['name' => 'create-score', 'display_name' => 'Create Score', 'description' => 'Establish a new Score', 'group' => 'Score'],
            ['name' => 'update-score', 'display_name' => 'Update Score', 'description' => 'Modify and update the Score', 'group' => 'Score'],
            ['name' => 'show-score', 'display_name' => 'Show Score', 'description' => 'View Score', 'group' => 'Score'],
            ['name' => 'delete-score', 'display_name' => 'Delete Score', 'description' => 'Delete Score', 'group' => 'Score'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}

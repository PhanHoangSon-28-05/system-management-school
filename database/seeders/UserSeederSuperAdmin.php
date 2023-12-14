<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeederSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_superAdmins = [
            ['username' => 'super-admin', 'password' => Hash::make('123456789')],
            ['username' => 'admin1', 'password' => Hash::make('123456789')],
            ['username' => 'admin2', 'password' => Hash::make('123456789')],
            ['username' => 'teacher1', 'password' => Hash::make('123456789')],
            ['username' => 'teacher2', 'password' => Hash::make('123456789')],
            ['username' => 'teacher3', 'password' => Hash::make('123456789')],
            ['username' => 'student1', 'password' => Hash::make('123456789')],
            ['username' => 'student2', 'password' => Hash::make('123456789')],
            ['username' => 'student3', 'password' => Hash::make('123456789')],
        ];

        foreach ($user_superAdmins as $value) {
            User::updateOrCreate($value);
        }

        $superAdmin = User::where('username', 'super-admin')->first();
        $role = Role::where('slug', 'super-admin')->first();
        $superAdmin->assignRole($role->name);
    }
}

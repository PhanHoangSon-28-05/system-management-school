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
        ];

        foreach ($user_superAdmins as $value) {
            $existingUser = User::where('username', $value['username'])->first();

            if (!$existingUser) {
                User::updateOrCreate($value);
            }
        }

        $superAdmin = User::where('username', 'super-admin')->first();
        $superAdmin->assignRole('super-admin');
        $role = Role::where('name', 'super-admin')->first();
        $superAdmin->assignRole($role->name);
    }
}

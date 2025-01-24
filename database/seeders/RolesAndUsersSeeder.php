<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin' => 'registrar@federalpolyilaro.edu.ng',
            'subadmin' => 'sub.registrar@federalpolyilaro.edu.ng',
            'member' => 'member@federalpolyilaro.edu.ng',
        ];

        foreach ($roles as $roleName => $email) {
            // Ensure the role exists
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Find the user by email
            $user = User::where('email', $email)->first();

            if ($user) {
                // Assign the role to the user
                $user->assignRole($role);
                echo "Assigned role '{$roleName}' to '{$email}'\n";
            } else {
                echo "User with email '{$email}' not found\n";
            }
        }
    }
}

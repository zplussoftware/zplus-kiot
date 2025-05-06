<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create basic roles for the system
        $roles = [
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Manager',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Sales',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Warehouse',
                'guard_name' => 'web',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run seeders in the correct order
        $this->call([
            // First create roles and permissions
            RoleSeeder::class,
            PermissionSeeder::class,
            
            // Create admin user
            AdminUserSeeder::class,
            
            // Create basic data
            WarehouseSeeder::class,
            CategorySeeder::class,
            UnitSeeder::class,
            CustomerGroupSeeder::class,
            
            // Create demo data (optional - can be commented out in production)
            DemoDataSeeder::class,
        ]);
    }
}

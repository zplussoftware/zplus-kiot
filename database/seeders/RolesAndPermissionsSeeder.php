<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // Product permissions
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'manage products']);
        
        // Order permissions
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'edit orders']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'manage orders']);
        
        // Customer permissions
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'edit customers']);
        Permission::create(['name' => 'delete customers']);
        Permission::create(['name' => 'manage customers']);
        
        // Warehouse permissions
        Permission::create(['name' => 'view warehouses']);
        Permission::create(['name' => 'create warehouses']);
        Permission::create(['name' => 'edit warehouses']);
        Permission::create(['name' => 'delete warehouses']);
        Permission::create(['name' => 'manage warehouses']);
        
        // User management permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'manage users']);
        
        // Report permissions
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'create reports']);
        
        // POS permissions
        Permission::create(['name' => 'access pos']);
        Permission::create(['name' => 'manage pos']);

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
        
        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo([
            'view products', 'create products', 'edit products', 'manage products',
            'view orders', 'create orders', 'edit orders', 'manage orders',
            'view customers', 'create customers', 'edit customers', 'manage customers',
            'view warehouses', 'manage warehouses',
            'view users', 
            'view reports', 'create reports',
            'access pos', 'manage pos'
        ]);
        
        $cashierRole = Role::create(['name' => 'cashier']);
        $cashierRole->givePermissionTo([
            'view products',
            'view customers', 'create customers',
            'create orders', 'view orders',
            'access pos'
        ]);
        
        $warehouseRole = Role::create(['name' => 'warehouse']);
        $warehouseRole->givePermissionTo([
            'view products', 'edit products',
            'view warehouses',
            'view orders'
        ]);
        
        // Create a default admin user if it doesn't exist
        if (!User::where('email', 'admin@zplus-kiot.com')->exists()) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@zplus-kiot.com',
                'password' => bcrypt('admin123'),
                'active' => 1,
            ]);
            
            $user->assignRole('admin');
        }
    }
}

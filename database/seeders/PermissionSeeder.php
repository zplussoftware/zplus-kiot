<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions by module
        $permissions = [
            // User management
            'view_users',
            'create_users',
            'edit_users',
            'delete_users',
            
            // Role and permissions
            'view_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'assign_permissions',
            
            // Warehouse management
            'view_warehouses',
            'create_warehouses',
            'edit_warehouses',
            'delete_warehouses',
            
            // Category management
            'view_categories',
            'create_categories',
            'edit_categories',
            'delete_categories',
            
            // Product management
            'view_products',
            'create_products',
            'edit_products',
            'delete_products',
            'view_product_stock',
            
            // Customer management
            'view_customers',
            'create_customers',
            'edit_customers',
            'delete_customers',
            
            // Supplier management
            'view_suppliers',
            'create_suppliers',
            'edit_suppliers',
            'delete_suppliers',
            
            // Order management
            'view_orders',
            'create_orders',
            'edit_orders',
            'delete_orders',
            'void_orders',
            'process_orders',
            
            // Reports
            'view_reports',
            'export_reports',
            
            // Stock management
            'view_stock',
            'create_stock_import',
            'transfer_stock',
            'adjust_stock',
            
            // Shift management
            'view_shifts',
            'open_close_shifts',
            
            // Warranty management
            'view_warranties',
            'create_warranty_claims',
            'process_warranty_claims',
            
            // System settings
            'manage_settings',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}

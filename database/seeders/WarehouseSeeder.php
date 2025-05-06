<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default warehouse
        Warehouse::create([
            'name' => 'Kho Chính',
            'code' => 'KHO-CHINH',
            'address' => 'Trụ sở công ty',
            'description' => 'Kho hàng chính của công ty',
            'is_active' => true,
            'is_default' => true,
        ]);

        // Add another sample warehouse
        Warehouse::create([
            'name' => 'Kho Chi Nhánh',
            'code' => 'KHO-CN1',
            'address' => 'Chi nhánh 1',
            'description' => 'Kho hàng chi nhánh 1',
            'is_active' => true,
            'is_default' => false,
        ]);
    }
}

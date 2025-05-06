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
            'location' => 'Trụ sở công ty',
            'description' => 'Kho hàng chính của công ty',
            'status' => 'active',
        ]);

        // Add another sample warehouse
        Warehouse::create([
            'name' => 'Kho Chi Nhánh',
            'location' => 'Chi nhánh 1',
            'description' => 'Kho hàng chi nhánh 1',
            'status' => 'active',
        ]);
    }
}

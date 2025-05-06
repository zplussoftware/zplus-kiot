<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create basic units for products
        $units = [
            [
                'name' => 'Cái',
                'symbol' => 'Cái',
            ],
            [
                'name' => 'Bộ',
                'symbol' => 'Bộ',
            ],
            [
                'name' => 'Chiếc',
                'symbol' => 'Chiếc',
            ],
            [
                'name' => 'Hộp',
                'symbol' => 'Hộp',
            ],
            [
                'name' => 'Thùng',
                'symbol' => 'Thùng',
            ],
            [
                'name' => 'Mét',
                'symbol' => 'm',
            ],
            [
                'name' => 'Kilogram',
                'symbol' => 'kg',
            ],
            [
                'name' => 'Gram',
                'symbol' => 'g',
            ],
            [
                'name' => 'Lít',
                'symbol' => 'L',
            ],
            [
                'name' => 'Mililitre',
                'symbol' => 'ml',
            ],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}

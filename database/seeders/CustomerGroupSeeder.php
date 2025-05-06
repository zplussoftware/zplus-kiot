<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerGroup;

class CustomerGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create customer groups with different discount levels
        $customerGroups = [
            [
                'name' => 'Khách lẻ',
                'description' => 'Khách hàng mua lẻ, không thường xuyên',
                'discount_percentage' => 0, // 0% discount
            ],
            [
                'name' => 'Khách thường',
                'description' => 'Khách hàng mua thường xuyên',
                'discount_percentage' => 3, // 3% discount
            ],
            [
                'name' => 'Khách buôn',
                'description' => 'Khách hàng mua số lượng lớn',
                'discount_percentage' => 5, // 5% discount
            ],
            [
                'name' => 'Khách VIP',
                'description' => 'Khách hàng VIP với ưu đãi đặc biệt',
                'discount_percentage' => 10, // 10% discount
            ],
            [
                'name' => 'Đối tác',
                'description' => 'Đối tác kinh doanh',
                'discount_percentage' => 15, // 15% discount
            ],
        ];

        foreach ($customerGroups as $group) {
            CustomerGroup::create($group);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main categories
        $laptops = Category::create([
            'name' => 'Laptop',
            'parent_id' => null,
            'description' => 'Các loại máy tính xách tay',
            'order' => 1,
        ]);

        $smartphones = Category::create([
            'name' => 'Điện thoại',
            'parent_id' => null,
            'description' => 'Các loại điện thoại di động',
            'order' => 2,
        ]);

        $accessories = Category::create([
            'name' => 'Phụ kiện',
            'parent_id' => null,
            'description' => 'Các loại phụ kiện điện tử',
            'order' => 3,
        ]);

        $components = Category::create([
            'name' => 'Linh kiện',
            'parent_id' => null,
            'description' => 'Các loại linh kiện máy tính',
            'order' => 4,
        ]);

        // Sub-categories for Laptops
        Category::create([
            'name' => 'Laptop Gaming',
            'parent_id' => $laptops->id,
            'description' => 'Laptop chuyên game',
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Laptop Văn phòng',
            'parent_id' => $laptops->id,
            'description' => 'Laptop dành cho công việc văn phòng',
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Laptop Đồ họa',
            'parent_id' => $laptops->id,
            'description' => 'Laptop chuyên đồ họa, thiết kế',
            'order' => 3,
        ]);

        // Sub-categories for Smartphones
        Category::create([
            'name' => 'iPhone',
            'parent_id' => $smartphones->id,
            'description' => 'Điện thoại iPhone của Apple',
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Samsung',
            'parent_id' => $smartphones->id,
            'description' => 'Điện thoại Samsung',
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Xiaomi',
            'parent_id' => $smartphones->id,
            'description' => 'Điện thoại Xiaomi',
            'order' => 3,
        ]);

        // Sub-categories for Accessories
        Category::create([
            'name' => 'Tai nghe',
            'parent_id' => $accessories->id,
            'description' => 'Các loại tai nghe',
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Sạc dự phòng',
            'parent_id' => $accessories->id,
            'description' => 'Các loại sạc dự phòng',
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Ốp lưng, bao da',
            'parent_id' => $accessories->id,
            'description' => 'Các loại ốp lưng, bao da điện thoại',
            'order' => 3,
        ]);

        // Sub-categories for Components
        Category::create([
            'name' => 'CPU',
            'parent_id' => $components->id,
            'description' => 'Bộ vi xử lý',
            'order' => 1,
        ]);

        Category::create([
            'name' => 'RAM',
            'parent_id' => $components->id,
            'description' => 'Bộ nhớ trong',
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Ổ cứng',
            'parent_id' => $components->id,
            'description' => 'Các loại ổ cứng SSD, HDD',
            'order' => 3,
        ]);
    }
}

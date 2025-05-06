<?php

namespace Database\Factories;

use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAttribute>
 */
class ProductAttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductAttribute::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $attributes = [
            'Màu sắc',
            'Kích thước',
            'Chất liệu',
            'Xuất xứ',
            'Thương hiệu',
            'Loại',
            'Mẫu mã',
            'Dung lượng',
            'Bộ nhớ',
            'Cấu hình'
        ];
        
        return [
            'name' => fake()->unique()->randomElement($attributes),
        ];
    }
}
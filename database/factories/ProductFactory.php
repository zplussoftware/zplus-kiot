<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);
        $price = fake()->randomFloat(2, 10000, 5000000);
        $cost = $price * 0.7; // Cost is 70% of price for demo

        return [
            'name' => $name,
            'sku' => strtoupper(substr(str_replace(' ', '', $name), 0, 3)) . fake()->unique()->randomNumber(5),
            'price' => $price,
            'cost' => $cost,
            'category_id' => Category::factory(),
            'unit_id' => Unit::factory(),
            'description' => fake()->paragraph(),
            'barcode' => fake()->ean13(),
            'is_serial_tracked' => fake()->boolean(30), // 30% chance to be serial tracked
            'min_stock_level' => fake()->numberBetween(5, 50),
        ];
    }

    /**
     * Indicate that the product is serial tracked.
     */
    public function serialTracked(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'is_serial_tracked' => true,
            ];
        });
    }

    /**
     * Indicate that the product is not serial tracked.
     */
    public function notSerialTracked(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'is_serial_tracked' => false,
            ];
        });
    }
}
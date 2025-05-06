<?php

namespace Database\Factories;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warehouse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Kho ' . fake()->unique()->word(),
            'location' => fake()->address(),
            'description' => fake()->paragraph(1),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Indicate that the warehouse is active.
     */
    public function active(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'active',
            ];
        });
    }

    /**
     * Indicate that the warehouse is inactive.
     */
    public function inactive(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'inactive',
            ];
        });
    }

    /**
     * Indicate that this is the main warehouse.
     */
    public function main(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Kho Chính',
                'location' => 'Trụ sở chính',
                'description' => 'Kho hàng chính của hệ thống',
                'status' => 'active',
            ];
        });
    }
}
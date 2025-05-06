<?php

namespace Database\Factories;

use App\Models\CustomerGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerGroup>
 */
class CustomerGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Nhóm ' . fake()->unique()->word(),
            'description' => fake()->sentence(),
            'discount_percentage' => fake()->randomFloat(1, 0, 20),
        ];
    }

    /**
     * Configure the group as a retail customer group.
     */
    public function retail(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Khách lẻ',
                'description' => 'Khách hàng mua lẻ',
                'discount_percentage' => 0,
            ];
        });
    }

    /**
     * Configure the group as a wholesale customer group.
     */
    public function wholesale(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Khách buôn',
                'description' => 'Khách hàng mua buôn',
                'discount_percentage' => 5,
            ];
        });
    }

    /**
     * Configure the group as a VIP customer group.
     */
    public function vip(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'VIP',
                'description' => 'Khách hàng VIP',
                'discount_percentage' => 10,
            ];
        });
    }
}
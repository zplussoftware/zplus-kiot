<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'contact_info' => fake()->name(),
            'address' => fake()->address(),
            'tax_code' => fake()->numerify('##########'),
            'email' => fake()->companyEmail(),
            'phone' => fake()->numerify('0#########'),
            'debt_total' => 0,
        ];
    }

    /**
     * Configure the supplier with a debt amount.
     */
    public function withDebt(float $amount = null): static
    {
        return $this->state(function (array $attributes) use ($amount) {
            return [
                'debt_total' => $amount ?? fake()->randomFloat(2, 1000000, 50000000),
            ];
        });
    }
}
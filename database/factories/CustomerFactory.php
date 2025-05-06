<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->numerify('0#########'),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'customer_group_id' => CustomerGroup::factory(),
            'tax_code' => fake()->boolean(30) ? fake()->numerify('##########') : null,
        ];
    }

    /**
     * Configure the customer to have a specific customer group.
     */
    public function withGroup(CustomerGroup $customerGroup): static
    {
        return $this->state(function (array $attributes) use ($customerGroup) {
            return [
                'customer_group_id' => $customerGroup->id,
            ];
        });
    }

    /**
     * Configure the customer as a retail customer.
     */
    public function retail(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'customer_group_id' => CustomerGroup::factory()->retail(),
                'tax_code' => null,
            ];
        });
    }

    /**
     * Configure the customer as a business customer.
     */
    public function business(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'customer_group_id' => CustomerGroup::factory()->wholesale(),
                'tax_code' => fake()->numerify('##########'),
            ];
        });
    }
}
<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Spatie\Permission\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpatieRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->jobTitle(),
            'guard_name' => 'web',
        ];
    }

    /**
     * Indicate that the role is an admin role.
     */
    public function admin(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin',
            ];
        });
    }

    /**
     * Indicate that the role is a manager role.
     */
    public function manager(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Manager',
            ];
        });
    }

    /**
     * Indicate that the role is a sales role.
     */
    public function sales(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Sales',
            ];
        });
    }

    /**
     * Indicate that the role is a warehouse role.
     */
    public function warehouse(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Warehouse',
            ];
        });
    }
}
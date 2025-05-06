<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Spatie\Permission\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SpatiePermission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $resources = ['users', 'roles', 'permissions', 'products', 'categories', 
                      'warehouses', 'customers', 'suppliers', 'orders', 'reports'];
        $actions = ['view', 'create', 'edit', 'delete'];
        
        $resource = fake()->randomElement($resources);
        $action = fake()->randomElement($actions);
        
        return [
            'name' => "{$action}_{$resource}",
            'guard_name' => 'web',
        ];
    }
}
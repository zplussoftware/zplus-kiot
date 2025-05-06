<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'parent_id' => null,
            'description' => fake()->sentence(),
            'order' => fake()->numberBetween(1, 100),
        ];
    }

    /**
     * Indicate that the category has a parent.
     */
    public function withParent(Category $parent = null): static
    {
        return $this->state(function (array $attributes) use ($parent) {
            return [
                'parent_id' => $parent ? $parent->id : Category::factory()->create()->id,
            ];
        });
    }
}
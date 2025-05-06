<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $units = [
            ['Cái', 'cái'],
            ['Chiếc', 'chiếc'],
            ['Bộ', 'bộ'],
            ['Cặp', 'cặp'],
            ['Hộp', 'hộp'],
            ['Gói', 'gói'],
            ['Kilogram', 'kg'],
            ['Gram', 'g'],
            ['Lít', 'l'],
            ['Mililit', 'ml'],
            ['Mét', 'm'],
            ['Centimét', 'cm'],
        ];
        
        $unit = fake()->unique()->randomElement($units);
        
        return [
            'name' => $unit[0],
            'symbol' => $unit[1],
        ];
    }
}
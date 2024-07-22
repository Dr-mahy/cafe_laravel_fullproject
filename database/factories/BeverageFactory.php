<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beverage>
 */
class BeverageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'content' => fake()->word(),
            'price'=>fake()->numerify(),
            'img'=>fake()->imageUrl(640, 480),
            'category_id' => fake()->numberBetween(3, 10),
            'published'=>fake()->numberBetween(0, 1),
            'special'=>fake()->numberBetween(0, 1),
        ];
    }
}

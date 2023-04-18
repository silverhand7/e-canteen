<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'category' => fake()->words(2, true),
            'price' => fake()->randomElement([10000, 20000, 15000, 1500, 5000, 6000, 8000, 9000]),
            'image' => 'images/dummy.png'
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            // 'name'=>fake()->name(),
            'city'=>fake()->city(),
            // 'description'=>null,
            'address'=>fake()->address(),
            'price'=>fake()->numberBetween(500,200),
            // 'category_id'=>null,
            'discount_value'=>fake()->numberBetween(5,40),
        ];
    }
}

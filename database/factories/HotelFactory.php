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
            'name'=>$this->fake()->name(),
            'city'=>$this->fake()->city(),
            'description'=>$this->fake()->description(),
            'address'=>$this->fake()->address(),
            'category_id'=>\App\Models\Category::factory(),
        ];
    }
}

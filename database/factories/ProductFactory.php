<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(1000, 999999),
            'category_id' => Category::query()->find(['id' => $this->faker->numberBetween(1, 4)])->first()->id
        ];
    }
}

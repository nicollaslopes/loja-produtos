<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->word),
            'cover' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(1, 20, 30),
            'description' => $this->faker->sentence(),
            'stock' => $this->faker->randomDigit(),
        ];
    }
}

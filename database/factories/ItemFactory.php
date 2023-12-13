<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence($nbWords = 6, $variableNbWords = true);

        return [
            'name' => $name,
            'slug' => toSlug($name),
            'description' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'price' => $this->faker->randomFloat($nbMaxDecimals = null, $min = 100, $max = 8000),
            'stock' => $this->faker->numberBetween(0, 300),
            'status' => $this->faker->boolean($chanceOfGettingTrue = 50),
        ];
    }
}

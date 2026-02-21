<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialAssistance>
 */
class SocialAssistanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thumbnail' => $this->faker->imageUrl(),
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(['food', 'education', 'health']),
            'amount' => $this->faker->numberBetween(100000, 1000000),
            'provider' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'is_available' => $this->faker->boolean(),
        ];
    }
}

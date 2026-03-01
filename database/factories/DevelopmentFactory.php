<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Development>
 */
class DevelopmentFactory extends Factory
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
            'description' => $this->faker->sentence(),
            'person_in_charge' => $this->faker->name(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'amount' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}

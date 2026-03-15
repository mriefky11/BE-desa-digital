<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyMember>
 */
class FamilyMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'profile_picture' => $this->faker->imageUrl(),
            'indetify_number' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'date_of_birth' => $this->faker->dateTimeBetween('-40 years', 'now'),
            'phone_number' => $this->faker->phoneNumber(),
            'occupation' => $this->faker->jobTitle(),
            'marital_status' => $this->faker->randomElement(['maried', 'single']),
            'relation' => $this->faker->randomElement(['wife', 'child', 'husband'])
        ];
    }
}

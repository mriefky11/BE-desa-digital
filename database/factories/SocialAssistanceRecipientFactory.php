<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SocialAssistanceRecipientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 100000, 1000000),
            'reason' => $this->faker->sentence(),
            'bank' => $this->faker->randomElement(['bri', 'bca', 'mandiri', 'bni']),
            'account_number' => $this->faker->unique()->randomNumber(100000000, 999999999),
            'proof' => $this->faker->url(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected'])
        ];
    }
}

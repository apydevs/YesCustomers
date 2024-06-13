<?php

namespace Apydevs\Customers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Apydevs\Customers\Models\Model>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date,
            'address_line1' => $this->faker->streetAddress,
            'address_line2' => $this->faker->secondaryAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->word,
            'country' => $this->faker->country,
            'postal_code' => $this->faker->postcode,
            'user_id' => \App\Models\User::all()->random(), // Assume you have a User model and factory
            'account_reference' => 'ACCT-' . strtoupper(Str::random(10)), // Generates a unique account reference

        ];
    }
}

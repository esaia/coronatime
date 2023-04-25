<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->country,
                'ka' => $this->faker->country
            ],
            'country' => $this->faker->country,
            'code' => $this->faker->countryCode,
            'confirmed' => $this->faker->numberBetween(0, 100000),
            'recovered' => $this->faker->numberBetween(0, 50000),
            'critical' => $this->faker->numberBetween(0, 1000),
            'deaths' => $this->faker->numberBetween(0, 10000),
        ];
    }
}

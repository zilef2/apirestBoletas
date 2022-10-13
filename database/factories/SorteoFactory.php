<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sorteo>
 */
class SorteoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->randomNumber(5, true),
            'ini' => $this->faker->dateTimeBetween('+1 week', '+3 week'),
            'fin' => $this->faker->dateTimeBetween('-2 week', '+1 week'),
            'valor_ganable' => ($this->faker->randomNumber(1, true)*1000000),
            'activa' => 1,
        ];
    }
}

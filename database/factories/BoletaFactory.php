<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boleta>
 */
class BoletaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->word(),
            'costo' => ($this->faker->randomNumber(2, true)*1000),
            'ganadora' => false,
            'user_id' => $this->faker->numberBetween(1, 10),
            'sorteo_id' => $this->faker->numberBetween(1, 2),
            'cuando_se_vendio' => $this->faker->dateTimeBetween('-1 week', '+1 week')
        ];
    }
}

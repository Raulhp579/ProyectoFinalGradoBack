<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo>
 */
class TipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'      => $this->faker->unique()->words(2, true), // “Premium Plus”
            'precio'      => $this->faker->randomFloat(2, 5, 199),
            'descripcion' => $this->faker->sentence(12),
            'imagen'      => null, // o $this->faker->imageUrl()
        ];
    }
}

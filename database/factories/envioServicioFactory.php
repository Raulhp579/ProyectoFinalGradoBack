<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\envioServicio>
 */
class envioServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Envío estándar',
                'Recogida en tienda',
                'Entrega internacional',
            ]),
            'tiempo_envio' => fake()->numberBetween(12, 168),
            'coste-base' => fake()->randomFloat(2, 5, 500),
            'activo' => $this->faker->boolean(),
            'id_usuario' => User::factory(),

        ];
    }
}

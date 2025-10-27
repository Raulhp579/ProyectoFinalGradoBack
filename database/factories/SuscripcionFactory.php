<?php

namespace Database\Factories;

use App\Models\Tipo;
use App\Models\User;
use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suscripcion>
 */
class SuscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_tipo'     => Tipo::factory(),
            'id_contrato' => Contrato::factory(),
            'mensualidad' => $this->faker->randomFloat(2, 5, 199),
            'id_usuario'  => User::factory(),
        ];
    }
}

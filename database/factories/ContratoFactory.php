<?php

namespace Database\Factories;

use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_usuario'=> User::all()->random()->id,
            'fecha_inicio'=> now(),
            'fecha_fin'=>fake()->date(),
            'descripcion'=>fake()->sentence()
        ];
    }
}

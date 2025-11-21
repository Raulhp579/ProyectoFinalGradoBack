<?php

namespace Database\Factories;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuscripcionReview>
 */
class SuscripcionReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id_usuario"=>User::all()->random()->id,
            "id_tipo"=>Tipo::all()->random()->id,
            "review"=>fake()->text()
        ];
    }
}

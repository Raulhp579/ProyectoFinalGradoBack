<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'id_categoria' => Categoria::inRandomOrder()->value('id') ?? Categoria::factory(),
            'nombre'       => ucfirst(fake()->words(2, true)),   // ej: "Banco plano"
            'descripcion'  => fake()->sentence(12),
            'espacio'      => fake()->randomFloat(2, 1, 10),     // metros cuadrados
            'instalacion'  => fake()->boolean(),
            'precio'       => fake()->randomFloat(2, 20, 5000),
            'imagen'       => fake()->imageUrl(640, 480, 'gym', true),
            'cantidad'     => fake()->numberBetween(0, 50),
            //
        ];
    }
}

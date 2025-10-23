<?php

namespace Database\Factories;

use App\Models\Contrato;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContratoProducto>
 */
class ContratoProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mensualidad'=>fake()->numberBetween(20,2000),
            'id_producto'=>Producto::all()->random()->id,
            'id_contrato'=>Contrato::all()->random()->id
        ];
    }
}

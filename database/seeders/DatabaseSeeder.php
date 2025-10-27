<?php

namespace Database\Seeders;


use App\Models\Contrato;
use App\Models\ContratoProducto;
use App\Models\User;
use App\Models\Suscripcion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(10)->create();
        Contrato::factory(20)->create();
        ContratoProducto::factory(20)->create(); 
        

    }
}

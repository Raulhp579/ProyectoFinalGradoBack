<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\User;
use App\Models\Contrato;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        User::factory(10)->create();
        Tipo::factory(5)->create();
        Contrato::factory(10)->create();

    
        Suscripcion::factory(3)->create();
    }
}

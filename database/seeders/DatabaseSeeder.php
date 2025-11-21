<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Contrato;
use App\Models\ContratoProducto;
use App\Models\EnvioServicio;
use App\Models\Producto;
use App\Models\User;
use App\Models\Suscripcion;
use App\Models\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Categoria::factory(4)->create();
        $this->call(TiposSeeder::class);
        //Tipo::factory(4)->create();
        Producto::factory(100)->create();
        Suscripcion::factory(10)->create();
        User::factory(20)->create();
        Contrato::factory(20)->create();
        ContratoProducto::factory(10)->create();
        EnvioServicio::factory(30)->create();
        
        
        ///////////////////////CREACIÓN DE ROLES/////////////////////////////////
        
        Role::create(['name'=>'ADMIN']);
    }
}

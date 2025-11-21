<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipo::create([
            'nombre' => 'Principiante',
            'precio' => 12,
            'descripcion' => 'Perfecta para quienes están dando sus primeros pasos. Esta suscripción ofrece acceso básico a las funciones esenciales, permitiéndote explorar la plataforma sin complicaciones. Ideal para usuarios que buscan familiarizarse con las herramientas principales antes de avanzar a planes más completos.',
            'imagen'=>'assets/images/principiante.png'
        ]);

        Tipo::create([
            'nombre' => 'Intermedio',
            'precio' => 15,
            'descripcion' => 'Pensada para usuarios que ya dominan lo básico y necesitan más herramientas para avanzar. Este plan amplía las funcionalidades esenciales, ofreciendo mejores opciones de personalización y un rendimiento superior. Ideal para quienes buscan un equilibrio entre simplicidad y potencia sin llegar aún a las características avanzadas.',
            'imagen'=>'assets/images/intermedio.png'
        ]);

        Tipo::create([
            'nombre' => 'Profesional',
            'precio' => 20,
            'descripcion' => 'Diseñada para usuarios exigentes que necesitan el máximo rendimiento y acceso completo a todas las funciones avanzadas. Este plan ofrece herramientas premium, mayor capacidad, soporte prioritario y opciones de personalización avanzadas. Ideal para profesionales y empresas que buscan sacar el máximo potencial de la plataforma sin límites.',
            'imagen'=>'assets/images/avanzado.png'
        ]);
        
        Tipo::create([
            'nombre' => 'Experto',
            'precio' => 25,
            'descripcion' => 'El nivel más completo y avanzado, creado para usuarios que requieren control total, acceso ilimitado y las herramientas más potentes del sistema. Este plan incluye todas las funcionalidades profesionales, optimizaciones exclusivas, soporte especializado y capacidades diseñadas para proyectos de alta exigencia. Ideal para expertos y equipos que necesitan un rendimiento superior sin compromisos.',
            'imagen'=>'assets/images/experto.png'
        ]);
        

    }
}

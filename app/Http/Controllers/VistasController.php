<?php

namespace App\Http\Controllers;

use App\Models\Tipo;

class VistasController extends Controller
{
    public function SuscripcionVista()
    {
        $tipos = Tipo::all();
        return view('Suscripcion', ['tipos' => $tipos]);
    }
    public function InicioVista()
    {
        return view('Inicio'); // nombre del blade sin .blade.php
    }
}

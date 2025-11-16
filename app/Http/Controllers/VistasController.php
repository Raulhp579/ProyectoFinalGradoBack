<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistasController extends Controller
{
    public function SuscripcionVista(){
        return view('Suscripcion');
    }
}

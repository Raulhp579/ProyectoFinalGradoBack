<?php

namespace App\Http\Controllers;

use App\Models\Tipo;

class VistasController extends Controller
{
    public function SuscripcionVista(){
        $tipos = Tipo::all();
        return view('Suscripcion',['tipos'=>$tipos]);
    }
}

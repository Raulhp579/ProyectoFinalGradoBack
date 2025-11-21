<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipo;

class VistasController extends Controller
{
    public function SuscripcionVista(){
        $tipos = Tipo::all();
        return view('Suscripcion',['tipos'=>$tipos]);
    }


    public function CarritoVista(){
        $productos = Producto::whereBetween("id",[1,5]);
        return view("carrito",["productos" =>$productos]);
    }
}

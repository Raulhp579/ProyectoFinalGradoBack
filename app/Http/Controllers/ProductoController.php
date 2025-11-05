<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function getAll(){
        $productos = Producto::all();

        return response()->json($productos);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoProducto;
use Illuminate\Http\Request;

class ContratoProductoController extends Controller
{
    public function create(Request $request){
        $contratoProducto = new ContratoProducto();
        $contratoProducto->mensualidad = $request->mensualidad;
        $contratoProducto->id_producto = $request->id_producto;
        $contratoProducto->id_contrato = $request->id_contrato;
        $contratoProducto->save();
    }

    public function delete(Request $request){
        $contratoProducto = ContratoProducto::where('id', $request->id)->first();

        if($contratoProducto){
            $contratoProducto->delete();
        }else{
            return response()->json(["error"=>"no se ha encontrado el contratoProducto"],404);
        }
    }

    public function update(Request $request){
        $contratoProducto = ContratoProducto::where('id', $request->id)->first();
        if($contratoProducto){
            $contratoProducto->{$request->cambio} = $request->valor;
            $contratoProducto->save();
        }else{
            return response()->json(["error"=>"no se ha encontrado el contratoProducto"],404);
        }
    }

    public function getAll(){
        $contratos = Contrato::all();
        return response()->json($contratos);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /////////////////CRUD/////////////////////
    public function create(Request $request){
        $contrato = new Contrato();
        $contrato->id_usuario = $request->id_usuario;
        $contrato->fecha_inicio = $request->fecha_inicio;
        if(isset($request->fecha_fin)){ //->puede ser que sea por defecto null
            $contrato->fecha_fin = $request->fecha_fin;
        }
        $contrato->descripcion = $request->descripcion;
        $contrato->save();
        return "Contrato creado correctamente";
    }

    public function delete(Request $request){ //te envia el id el cliente

        $contrato = Contrato::where('id',$request->id)->first();
        if($contrato){
            $contrato->delete();
        }else{
            return response()->json(['error'=>'contrato no encontrado'],404);
        }
    }

    public function update(Request $request){ //te envia el id lo que quiere cambiar y el nuevo dato
        $contrato = Contrato::where('id',$request->id)->first();
        if($contrato){
            $contrato->{$request->cambio} = $request->valor;
            $contrato->save();
        }else{
            return response()->json(['error'=>'contrato no encontrado'],404);
        }
    }

    public function getAll(){
        $contratos = Contrato::all();
        return response()->json($contratos);
    }

    public function getById(){
        
    }
}

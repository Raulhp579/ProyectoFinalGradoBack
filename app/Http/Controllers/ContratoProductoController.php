<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoProducto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoProductoController extends Controller
{
    public function validar(){
        $reglas = [
            'mensualidad'=>'required|numeric',
            'id_producto'=>'integer|exists:productos,id|required',
            'id_contrato'=>'integer|exists:contrato,id|required'
        ];

        $mensajes = [
            'mensualidad.required'=>'Debes de establecer una mensualidad',
            'mensualidad.double'=>'El numero debe de ser de tipo numérico decimal',
            'id_producto.integer'=>'El id debe de ser de tipo numérico',
            'id_producto.exists'=>'El producto debe de existir',
            'id_producto.required'=>'El id del producto es requerido',
            'id_contrato.integer'=>'El id del contrato debe de ser de tipo numérico',
            'id_contrato.exists'=>'El id del contrato debe de existir',
            'id_contrato.required'=>'El id del contrato es requerido'
        ];

        return [$reglas, $mensajes];
    }
    public function create(Request $request){
        
        $validar = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);
        try{
            if($validar->fails()){
                return response()->json(["error"=>$validar->errors()->first()]);
            }
        
        
            $contratoProducto = new ContratoProducto();
            $contratoProducto->mensualidad = $request->mensualidad;
            $contratoProducto->id_producto = $request->id_producto;
            $contratoProducto->id_contrato = $request->id_contrato;
            $contratoProducto->save();
            return response()->json(["success"=>"El contrato se ha creado correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"El contrato producto no se ha podido crear correctamente",
                                        "fallo"=>$e->getMessage()]);
        }

    }

    public function delete(Request $request){
        $contratoProducto = ContratoProducto::where('id', $request->id)->first();

        if(!$contratoProducto){
            return response()->json(["error"=>"no se ha encontrado el contrato producto"]);
        }

        try{
            $contratoProducto->delete();
            return response()->json(["success"=>"contrato borrado correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"No se ha podido borrar el contrato producto",
                                        "fallo"=>$e->getMessage()]);
        }
            

    }

    public function update(Request $request, string $id){
        $contratoProducto = ContratoProducto::where('id', $id)->first();
        try{
            if(!$contratoProducto){
                return response()->json(["error"=>"el contrato producto no se ha encontrado"]);
            }

            $contratoProducto->mensualidad = $request->mensualidad;
            $contratoProducto->id_producto = $request->id_producto;
            $contratoProducto->id_contrato = $request->id_contrato;
            $contratoProducto->save();
            return response()->json(['success'=>'El contrato se ha actualizado correctamente']);
        }catch(Exception $e){
            return response()->json(["error"=>"El contrato producto no se ha podido actualizar correctamente",
                                        "fallo"=>$e->getMessage()]);
        }
        
    }

    public function getAll(){
        $contratos = Contrato::all();

        if(!$contratos){
            return response()->json(["error"=>"No se ha encontrado ningun contrato"]);
        }

        try{
            return response()->json($contratos);
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido mostrar los contratos",
                                        "fallo"=>$e->getMessage()]);
        }
        
    }

    public function getById(string $id){
        $contrato = ContratoProducto::where("id",$id)->first();

        if(!$contrato){
            return response()->json(["error"=>"no se ha encontrado el contrato producto"]);
        }

        try{
            return response()->json($contrato);
        }catch(Exception $e){
            return response()->json(["error"=>"El contrato no se ha podido mostrar",
                                        "fallo"=>$e->getMessage()]);
        }
        


    }
}

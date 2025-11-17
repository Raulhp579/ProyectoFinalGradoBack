<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContratoController extends Controller
{
    //////////////////REGLAS///////////////////////
    public static function validar(){
        $reglas = [
            'id_usuario'=>'required|integer|exists:users,id',
            'fecha_inicio'=>'date',
            'fecha_fin'=>'date',
            'descripcion'=>'string|max:250'
        ];

        $mensajes=[
            'id_usuario.required'=>'necesitas asociarlo con un id de usuario',
            'id_usuario.integer'=>'El id de usuario debe de ser de tipo usuario',
            'id_usuario.exists'=>'El usuario debe de existir',
            'fecha_inicio.date'=>'la fecha debe de ser de tipo date',
            'fecha_fin.date'=>'la fecha debe de ser de tipo date',
            'descripcion.string'=>'la descripcion debe de ser de tipo texto',
            'descripcion.max'=>'la descripcion debe de tener como maximo 250 caracteres'
        ];

        return [$reglas, $mensajes];
    }

    /////////////////CRUD/////////////////////
    public function create(Request $request){

        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);
        try{
            if($validacion->fails()){
                return response()->json(["error"=>$validacion->errors()->first()]);
            }

            $contrato = new Contrato();
            $contrato->id_usuario = $request->id_usuario;
            $contrato->fecha_inicio = $request->fecha_inicio;
            if(isset($request->fecha_fin)){ //->puede ser que sea por defecto null
                $contrato->fecha_fin = $request->fecha_fin;
            }
                $contrato->descripcion = $request->descripcion;


            $contrato->save();
            return response()->json(['success'=>'el contrato se ha creado correctamente']);
        }catch(Exception $e){
            return response()->json(['error'=>'el contrato no se ha podido crear correctamente',
                                        'fallo'=>$e->getMessage()]);
        }

 }

    public function delete(string $id){ //te envia el id el cliente

        try{
            $contrato = Contrato::where('id',$id)->first();
            if(!$contrato){
                return response()->json(['fallo'=>'el contrato no se ha podido encontrar']);
            }
            $contrato->delete();
            return response()->json(['success'=>'contrato borrado correctamente']);
        }catch(Exception $e){
            return response()->json(['error'=>'el contrato no se ha podido borrar correctamente',
                                        'fallo'=>$e->getMessage()]);
        }

        
    }

    public function update(Request $request, string $id){ 
        $contrato = Contrato::where("id",$id)->first();
        if(!$contrato){
            return response()->json(['success'=>'el contrato no se ha encontrado']);
        }

        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);
        try{
            if($validacion->fails()){
                return response()->json(['error'=>$validacion->errors()->first()]);
            }


            $contrato->id_usuario = $request->id_usuario;
            $contrato->fecha_inicio = $request->fecha_inicio;
            $contrato->fecha_fin = $request->fecha_fin;
            $contrato->descripcion = $request->descripcion;
            $contrato->save();

            return response()->json(['success'=>'El contrato se ha actualizado correctamente']);
        }catch(Exception $e){
            return response()->json(['error'=>'El contrato no se ha actualizado correctamente',
                                       'fallo'=>$e->getMessage()]);
        }


    }

    public function getAll(){
        try{
            $contratos = Contrato::all();
            return response()->json($contratos);
        }catch(Exception $e){
            return response()->json(['error'=>'no se han podido obtener los contratos',
                                        'fallo'=>$e->getMessage()]);
        }

    }

    public function getById(string $id){
        $contrato = Contrato::where("id",$id)->first();

        if(!$contrato){
            return response()->json(['error'=>'el contrato no se ha encontrado']);
        }

        try{
            return response()->json($contrato);
        }catch(Exception $e){
            return response()->json(['error'=>'el contrato no se ha podido eliminar correctamente',
                                        'fallo'=>$e->getMessage()]);
        }
    }
}

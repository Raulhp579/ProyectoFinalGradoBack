<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\EnvioServicio;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class EnvioServicioController extends Controller
{
    public static function validar(){
        $reglas = [
            'tiempo_envio'=>'required|date', //fecha prevista
            'coste_base'=>'required|numeric',
            'activo'=>'required|boolean',
            'id_usuario'=>'required|exists:users,id'
        ];

        $mensajes = [
            'tiempo_envio.required'=>'La fecha prevista es requerida',
            'tiempo_envio.date'=>'La fecha prevista debe de ser de tipo fecha',
            'coste_base.required'=>'El coste base es requerido',
            'coste_base.numeric'=>'El coste debe de ser de tipo numerico',
            'activo.required'=>'El estado es requerido',
            'activo.boolean'=>'El estado debe de ser de tipo booleano',
            'id_usuario.required'=>'El usuario asociado es requerido',
            'id_usuario.exists'=>'El usuario debe de existir'
        ];

        return [$reglas,$mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $envios = EnvioServicio::all();
            return response()->json($envios);
        } catch (Exception $e) {
            return response()->json([
                "error" => "error al mostrar los envios",
                "fallo" => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(),$this->validar()[0],$this->validar()[1]);

        if($validar->fails()){
            return response()->json(["error"=>$validar->errors()->first()]);
        }

        try {
            $es = new EnvioServicio();
            //$es->nombre = $request->nombre;
            $es->tiempo_envio = $request->tiempo_envio;
            $es->coste_base = $request->coste_base;
            $es->activo = $request->activo;
            $es->id_usuario = $request->id_usuario;
            $es->save();

            return response()->json(
                [
                    "mensaje" => "Envío creado correctamente"
                ]
            );
        } catch (Exception $e) {
            return response()->json([
                "error" => "no se ha podido crear el envio",
                "fallo" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $envio = EnvioServicio::where("id",$id)->first();
            if(!$envio){
                return response()->json(["error"=>"no se ha encontrado el envio"]);
            }

            return response()->json($envio);
        }catch(Exception $e){
            return response()->json(["error"=>"fallo en mostrar el envio",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validar = Validator::make($request->all(), $this->validar()[0],$this->validar()[1]);

        if($validar->fails()){
            return response()->json(['error'=>$validar->errors()->first()]);
        }

        $es = EnvioServicio::where("id", $id)->first();
        if (!$es) {
            return response()->json(["error" => "no se ha encontrado"]);
        }
        try {
           // $es->nombre = $request->nombre;
            $es->tiempo_envio = $request->tiempo_envio;
            $es->coste_base = $request->coste_base;
            $es->activo = $request->activo;
            $es->id_usuario = $request->id_usuario;
            $es->save();

            return response()->json(["success" => "actualizado con exito"]);
        } catch (Exception $e) {
            return response()->json([
                "error" => "No se ha podido actualizar por un error",
                "fallo" => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $envioServicio = EnvioServicio::whereId($id)->first();
            if (!$envioServicio) {
                return response()->json(["error" => "no se ha encontrado"]);
            }
            $envioServicio->delete();
            return response()->json(["success" => "se ha eliminado"]);
        } catch (Exception $e) {
            return response()->json([
                "error" => "No se ha podido eliminar por un error",
                "fallo" => $e->getMessage()
            ]);
        }
    }
}

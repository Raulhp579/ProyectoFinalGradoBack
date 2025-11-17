<?php

namespace App\Http\Controllers;

use App\Models\EnvioServicio;
use Illuminate\Http\Request;

class EnvioServicioController extends Controller
{

    public function index()
    {
        return EnvioServicio::all();
    }

    public function create(Request $request)
    {
        $es = new EnvioServicio();
        $es->nombre = $request["nombre"];
        $es->tiempo_envio = $request["tiempo_envio"];
        $es->coste_base = $request["coste_base"];
        $es->activo = $request["activo"];
        $es->id_usuario = $request["id_usuario"];

        $es->save();

        return response()->json(
            [
                "mensaje" => "Envío creado correctamente",
                "data" => $es
            ]
        );
    }


    public function store(Request $request) {}


    public function show(string $id) {}


    public function edit(string $id) {}


    public function update(Request $request, string $nombre) {
        $es = EnvioServicio::where("nombre", $nombre)->first();
            if(!$es){
                return response()->json(["error"=>"no se ha encontrado"]);      
            }        
            try {
                $es->nombre = $request->nombre;
                $es->tiempo_envio = $request->tiempo_envio;
                $es->coste_base= $request->coste_base;
                $es->activo = $request->activo;
                $es->id_usuario = $request->id_usuario;
                $es->save();

                return response()->json(["success"=>"actualizado con exito"]);

            }catch (Exception $e) {
            return response()->json(["error"=>"No se ha podido actualizar por un error",
        "fallo"=>$e->getMessage()]);
        }
    }


    public function destroy(string $id) {
        try {
            $envioServicio = EnvioServicio::whereId($id)->fist();
            if(!$envioServicio){
                return response()->json(["error"=>"no se ha encontrado"]);      
            }
            $envioServicio->delete();
            return response()->json(["success"=>"se ha eliminado"]);
        } catch (Exception $e) {
            return response()->json(["error"=>"No se ha podido eliminar por un error",
        "fallo"=>$e->getMessage()]);
        }
    }
}

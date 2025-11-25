<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Exception;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{

    public function validar(){
        $reglas = [
            "idTipo" => "required|exists:suscripcion",
            "mensualidad" => "required|numeric",
        ];


        $mensajes = [
            "idTipo.require" => "El idTipo es obligatorio",
            "idTipo.exists" => "El idTipo de la suscripcion debe de existir",
            "mensualidad.required" => "La mensualidad es obligatoria",
            "mensualidad.numeric" => "La mensualidad debe de ser un numero", 
        ];
        return [$reglas, $mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $suscripciones = Suscripcion::all();
            return response()->json($suscripciones);
        }catch(Exception $e){
            return response()->json(['error'=>'no se han podido obtener las suscripciones',
                                        'fallo'=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $suscripcion = new Suscripcion;
            $suscripcion->idTipo = $request->idTipo;
            $suscripcion->mensualidad = $request->mensualidad;

            $suscripcion->save();

            return response()->json('Se ha creado correctamente la suscripcion');
        } catch (Exception $e) {
            return response()->json('No se ha creado correctamente la suscripcion'.$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
    {

        $suscripcion = Suscripcion::whereId($id)->first();

        return response()->json($suscripcion);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $suscripcion = Suscripcion::whereId($id)->first();
        try {
            if (!$suscripcion) {
                return response()->json(['error' => 'La suscripcion no se ha encontrado']);
            }
            

            $suscripcion->idTipo = $request->idTipo;
            $suscripcion->mensualidad= $request->mensualidad;

            $suscripcion->save();

            return response()->json('La suscripcion se ha actualizado correctamente');
        } catch (Exception $e) {
            return response()->json('La suscripcion NO se ha actualizado correctamente').$e->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suscripcion = Suscripcion::whereId($id)->first();
        try {
            if (!$suscripcion) {
                return response()->json(['error' => 'La suscripcion no se ha encontrado']);
            }
            
           

            $suscripcion->delete();
            return response()->json("Se ha borrado la suscripcion correctamente");
        } catch (Exception $e) {
            return response()->json("NO se ha borrado la suscripcion correctamente").$e->getMessage();
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Exception;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suscripciones = Suscripcion::all();

        return response()->json($suscripciones);
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

            return response()->json('Se ha creado correctamente la suscripción');
        } catch (Exception $e) {
            return response()->json('No se ha creado correctamente la suscripción'.$e->getMessage());
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
        try {
            $suscripcion = Suscripcion::whereId($id)->first();

            $suscripcion->{$request->cambioId} = $suscripcion->cambioIdTipo;
            $suscripcion->{$request->cambioM} = $suscripcion->cambioMensualidad;

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
        try {
            $suscripcion = Suscripcion::whereId($id)->first();

            $suscripcion->delete();
            return response()->json("Se ha borrado la suscripcion correctamente");
        } catch (Exception $e) {
            return response()->json("NO se ha borrado la suscripcion correctamente").$e->getMessage();
        }

    }
}

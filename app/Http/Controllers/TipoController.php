<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Exception;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipo::all();

        return response()->json($tipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $tipo = new Tipo;

            $tipo->nombre = $request->nombre;
            $tipo->precio = $request->precio;
            $tipo->descripcion = $request->descripcion;
            $tipo->imagen = $request->imagen;

            $tipo->save();

            return response()->json("Se ha creado el tipo correctamente");
        } catch (Exception $e) {
            return response()->json("NO se ha creado el tipo correctamente".$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipo = Tipo::whereId($id)->first();

        return response()->json($tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $tipo = Tipo::whereId($id)->first();

            $tipo->{$request->cambioN} = $tipo->cambioNombre;
            $tipo->{$request->cambioP} = $tipo->cambioPrecio;
            $tipo->{$request->cambioDesc} = $tipo->cambioDescripcion;
            $tipo->{$request->cambioIma} = $tipo->cambioImagen;

            $tipo->save();

            return response()->json("Se ha actualizado el tipo correctamente");
        } catch (Exception $e) {
            return response()->json("NO se ha actualizado el tipo correctamente".$e->getMessage());
        }
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tipo = Tipo::whereId($id)->first();

            $tipo->delete();
            
            return response()->json("Se ha borrado el tipo correctamente");
        } catch (Exception $e) {
            return response()->json("NO se ha borrado el tipo correctamente".$e->getMessage());
        }
      

    }
}

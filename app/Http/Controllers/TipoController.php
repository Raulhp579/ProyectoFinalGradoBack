<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
{



    public function validar(){
        $reglas = [
            "nombre" => "required|string|max:255",
            "precio" => "required|numeric",
            "descripcion" => "required|min:10|max:500",
            "imagen" => "required|string",
        ];


        $mensajes = [
            "nombre.required" => "El nombre del tipo es obligatorio",
            "nombre.string" => "El nopmbre debe ser una cadena de texto",
            "precio.required" => "El precio es obligatorio",
            "precio.numeric" => "El precio debe ser un número",
            "descripcion.required" => "La descripcion debe ser obligatoria", 
            "imagen.required" => "La imagen debe ser obligatoria",
            "imagen.string" => "La imagen debe ser una cadena de texto",
            
        ];

        return [$reglas, $mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $tipos = Tipo::all();
            return response()->json($tipos);
        }catch(Exception $e){
            return response()->json(['error'=>'no se han podido obtener los tipos',
                                        'fallo'=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);
        try {
            if($validacion->fails()){
                return response()->json(["error"=>$validacion->errors()->first()]);
            }

            $tipo = new Tipo();
            $tipo->nombre = $request->nombre;
            $tipo->precio = $request->precio;
            $tipo->descripcion = $request->descripcion;
            $tipo->imagen = $request->imagen;

            $tipo->save();

            return response()->json('Se ha creado el tipo correctamente');
        } catch (Exception $e) {
            return response()->json('NO se ha creado el tipo correctamente'.$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipo = Tipo::whereId($id)->first();

        if(!$tipo){
            return response()->json(['error'=>'el tipo no se ha encontrado']);
        }


        try{
            return response()->json($tipo);
        }catch(Exception $e){
            return response()->json(['error'=>'el tipo no se ha podido eliminar correctamente',
                                        'fallo'=>$e->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo = Tipo::whereId($id)->first();
        if (!$tipo) {
            return response()->json(['error' => 'El tipo no se ha encontrado']);
        }

        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);
        try {
            
            if($validacion->fails()){
                return response()->json(['error'=>$validacion->errors()->first()]);
            }
            

            $tipo->nombre = $request->nombre;
            $tipo->precio = $request->precio;
            $tipo->descripcion = $request->descripcion;
            $tipo->imagen = $request->imagen;

            $tipo->save();

            return response()->json('Se ha actualizado el tipo correctamente');
        } catch (Exception $e) {
            return response()->json('NO se ha actualizado el tipo correctamente'.$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = Tipo::whereId($id)->first();
        try {
            if (!$tipo) {
                return response()->json(['error' => 'El tipo no se ha encontrado']);
            }
            

            $tipo->delete();

            return response()->json('Se ha borrado el tipo correctamente');
        } catch (Exception $e) {
            return response()->json('NO se ha borrado el tipo correctamente'.$e->getMessage());
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function validar()
    {
        $reglas = [
            'nombre'   => 'required|string|max:255',
            'padre_id' => 'nullable|integer|exists:categorias,id',
        ];

        $mensajes = [
            'nombre.required'  => 'El nombre de la categoría es obligatorio',
            'nombre.string'    => 'El nombre debe ser una cadena de texto',
            'padre_id.integer' => 'El id del padre debe ser numérico',
            'padre_id.exists'  => 'La categoría padre indicada no existe',
        ];

        return [$reglas, $mensajes];
    }

    public function create(Request $request)
    {
        $validar = Validator::make(
            $request->all(),
            $this->validar()[0],
            $this->validar()[1]
        );

        try {
            if ($validar->fails()) {
                return response()->json(['error' => $validar->errors()->first()]);
            }

            $categoria = new Categoria();
            $categoria->nombre   = $request->nombre;
            $categoria->padre_id = $request->padre_id;
            $categoria->save();

            return response()->json([
                'success'   => 'La categoría se ha creado correctamente',
                'categoria' => $categoria
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'La categoría no se ha podido crear correctamente',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request)
    {
        $categoria = Categoria::where('id', $request->id)->first();

        if (!$categoria) {
            return response()->json(['error' => 'No se ha encontrado la categoría']);
        }

        try {
            $categoria->delete();
            return response()->json(['success' => 'Categoría borrada correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se ha podido borrar la categoría',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::where('id', $id)->first();

        try {
            if (!$categoria) {
                return response()->json(['error' => 'La categoría no se ha encontrado']);
            }

            $categoria->nombre   = $request->nombre;
            $categoria->padre_id = $request->padre_id;
            $categoria->save();

            return response()->json(['success' => 'La categoría se ha actualizado correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'La categoría no se ha podido actualizar correctamente',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function getAll()
    {
        $categorias = Categoria::all();

        if ($categorias->isEmpty()) {
            return response()->json(['error' => 'No se ha encontrado ninguna categoría']);
        }

        try {
            return response()->json($categorias);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se han podido mostrar las categorías',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function getById(string $id)
    {
        $categoria = Categoria::where('id', $id)->first();

        if (!$categoria) {
            return response()->json(['error' => 'No se ha encontrado la categoría']);
        }

        try {
            return response()->json($categoria);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'La categoría no se ha podido mostrar',
                'fallo' => $e->getMessage()
            ]);
        }
    }
}
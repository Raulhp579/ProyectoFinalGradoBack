<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function validar()
    {
        $reglas = [
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'id_categoria' => 'required|integer|exists:categorias,id',
            'instalacion'  => 'required|boolean',
            'precio'       => 'required|numeric',
            'espacio'      => 'required|numeric',
            'cantidad'     => 'required|integer|min:0',
            'imagen'       => 'nullable|string',
        ];

        $mensajes = [
            'nombre.required'        => 'El nombre del producto es obligatorio',
            'nombre.string'          => 'El nombre debe ser una cadena de texto',
            'id_categoria.required'  => 'La categoría es obligatoria',
            'id_categoria.integer'   => 'El id de la categoría debe ser numérico',
            'id_categoria.exists'    => 'La categoría seleccionada no existe',
            'instalacion.required'   => 'Debes indicar si incluye instalación',
            'instalacion.boolean'    => 'Instalación debe ser verdadero o falso',
            'precio.required'        => 'El precio es obligatorio',
            'precio.numeric'         => 'El precio debe ser un número',
            'espacio.required'       => 'El espacio ocupado es obligatorio',
            'espacio.numeric'        => 'El espacio debe ser un número',
            'cantidad.required'      => 'La cantidad es obligatoria',
            'cantidad.integer'       => 'La cantidad debe ser numérica entera',
            'cantidad.min'           => 'La cantidad no puede ser negativa',
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

            $producto = new Producto();
            $producto->nombre       = $request->nombre;
            $producto->descripcion  = $request->descripcion;
            $producto->id_categoria = $request->id_categoria;
            $producto->instalacion  = $request->instalacion;
            $producto->precio       = $request->precio;
            $producto->espacio      = $request->espacio;
            $producto->cantidad     = $request->cantidad;
            $producto->imagen       = $request->imagen;
            $producto->save();

            return response()->json([
                'success'  => 'El producto se ha creado correctamente',
                'producto' => $producto
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'El producto no se ha podido crear correctamente',
                'fallo' => $e->getMessage()
            ]);
        }
    }


    public function index()
    {
        $productos = Producto::all();   // SIN categoría
        return view("AdministrarProductos", ['productos' => $productos]);
    }

        // VISTA: mostrar formulario de crear producto
    public function vistaCrear()
    {
        return view('CrearProducto'); // nombre del Blade del formulario
    }

    // VISTA: guardar producto desde el formulario HTML
    public function storeDesdeVista(Request $request)
    {
        // Validación más simple para la vista
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'precio'      => 'required|numeric|min:0',
            'cantidad'    => 'required|integer|min:0',
            'imagen'      => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Crear producto nuevo
        $producto = new Producto();
        $producto->nombre      = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio      = $request->precio;
        $producto->cantidad    = $request->cantidad;
        $producto->imagen      = $request->imagen;

        // 
        // les ponemos valores por defecto para que no peten.
        $producto->id_categoria = 1;      //  Asegúrate de que existe la categoría 1
        $producto->instalacion  = false;  // sin instalación por defecto
        $producto->espacio      = 0;      // 0 m² por defecto

        $producto->save();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    


    public function delete(Request $request)
    {
        $producto = Producto::where('id', $request->id)->first();

        if (!$producto) {
            return response()->json(['error' => 'No se ha encontrado el producto']);
        }

        try {
            $producto->delete();
            return response()->json(['success' => 'Producto borrado correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se ha podido borrar el producto',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::where('id', $id)->first();

        try {
            if (!$producto) {
                return response()->json(['error' => 'El producto no se ha encontrado']);
            }

            $producto->nombre       = $request->nombre;
            $producto->descripcion  = $request->descripcion;
            $producto->id_categoria = $request->id_categoria;
            $producto->instalacion  = $request->instalacion;
            $producto->precio       = $request->precio;
            $producto->espacio      = $request->espacio;
            $producto->cantidad     = $request->cantidad;
            $producto->imagen       = $request->imagen;

            $producto->save();

            return response()->json(['success' => 'El producto se ha actualizado correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'El producto no se ha podido actualizar correctamente',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function getAll()
    {
        $productos = Producto::all();

        if ($productos->isEmpty()) {
            return response()->json(['error' => 'No se ha encontrado ningún producto']);
        }

        try {
            return response()->json($productos);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se han podido mostrar los productos',
                'fallo' => $e->getMessage()
            ]);
        }
    }

    public function getById(string $id)
    {
        $producto = Producto::where('id', $id)->first();

        if (!$producto) {
            return response()->json(['error' => 'No se ha encontrado el producto']);
        }

        try {
            return response()->json($producto);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'El producto no se ha podido mostrar',
                'fallo' => $e->getMessage()
            ]);
        }
    }
}

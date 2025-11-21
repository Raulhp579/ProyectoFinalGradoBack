<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    ////////////REGLAS//////////////
    public static function validar(){
        $reglas = [
            'nombre'=>'required|string|max:30',
            'apellidos'=>'required|string',
            'email'=>'required|unique:users,email|email',
            'contraseña'=>'required|min:8',
            'telefono'=>'required|numeric',//mirar formato
            'direccion'=>'required',
            'fecha_alta'=>'date',
            'id_suscripcion'=>'numeric|exists:suscripcion,id'
        ];

        $mensajes = [
            'nombre.required'=>'El nombre es requerido',
            'nombre.string'=>'El nombre debe de ser de tipo texto',
            'nombre.max'=>'Como maximo se permiten 30 caracteres en el nombre',
            'apellidos.required'=>'El apellido es requerido',
            'apellidos.string'=>'El apellido debe ser de tipo texto',
            'email.required'=>'El email es requerido',
            'email.unique'=>'El email ya existe',
            'email.email'=>'El email no tiene el formato correcto',
            'contraseña.required'=>'La contraseña es requerida',
            'contraseña.min'=>'La contraseña como minimo debe de tener 8 caracteres',
            'telefono.required'=>'El telefono es requerido',
            'telefono.numeric'=>'El telefono no tiene el formato correcto',
            'direccion.required'=>'La direccion es requerida',
            'fecha_alta.date'=>'La fecha no tiene un formato correcto',
            'id_suscripcion.numeric'=>'La suscripcion debe de ser de tipo numerico',
            'id_suscripcion.exists'=>'La suscripcion debe de existir',
        ];

        return [$reglas,$mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $usuarios = User::all();
            return response()->json($usuarios);
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido mostrar los usuarios",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);

        if($validacion->fails()){
            
            return response()->json(["error"=>$validacion->errors()->first()]);
        }

        try{
            $user = new User();
            $user->name = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;
            $user->password = $request->contraseña;
            $user->telefono = $request->telefono;
            $user->direccion = $request->direccion;
            $user->fecha_alta = now(); //no es necesario introducirlo
            if(isset($request->id_suscripcion)){
                $user->id_suscripcion = $request->id_suscripcion;
            }
            $user->save();
            return response()->json(["success"=>"usuario creado corrrectamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"fallo al crear el usuario",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $usuario = User::where('id',$id)->first();
            if(!$usuario){
                return response()->json(["error"=>"no se ha encontrado el usuario"]);
            }
            return response()->json($usuario);
        }catch(Exception $e){
            return response()->json(["error"=>"error al mostrar el usuario",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = Validator::make($request->all(), $this->validar()[0], $this->validar()[1]);

        if($validacion->fails()){
            return response()->json(['error'=>$validacion->errors()->first()]);
        }

        try{
            $user = User::where('id',$id)->first();
            if(!$user){
                return response()->json(["error"=>"no se ha encontrado el usuario"]);
            }
            $user->name = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;
            $user->password = $request->contraseña;
            $user->telefono = $request->telefono;
            $user->direccion = $request->direccion;
            $user->fecha_alta = $request->fecha_alta;
            $user->id_suscripcion = $request->id_suscripcion;
            $user->save();
            return response()->json(["success"=>"usuario actualizado correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"error al actualizar el usuario",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $user = User::where('id',$id)->first();
            if(!$user){
                return response()->json(["error"=>"no se ha encontrado el usuario"]);
            }

            $user->delete();
            return response()->json(["success"=>"Usuario borrado correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"error al eliminar el usuario",
                                        "fallo"=>$e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SuscripcionReview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuscripcionReviewController extends Controller
{

    public static function validar(){
        $reglas = [
            'id_usuario'=>'required|exists:users,id|numeric',
            'id_tipo'=>'required|exists:tipo_suscripcion,id|numeric',
            'review'=>'required|string'
        ];

        $mensajes = [
            'id_usuario.required'=>'El id del usuario es requerido',
            'id_usuario.exists'=>'el usuario debe de existir',
            'id_usuario'=>'el id del usuario debe de ser de tipo numerico',
            'id_tipo.required'=>'el id del tipo es requerido',
            'id_tipo.exists'=>'el del tipo debe de existir',
            'id_tipo.numeric'=>'el del tipo debe de ser numerico',
            'review.required'=>'la review es requerida',
            'review.string'=>'la review debe de ser de tipo texto'
        ];

        return [$reglas,$mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)//se puede buscar por id del tipo
    {
        try{
            
            if(isset($request->tipo)){
                $reviews = SuscripcionReview::where("id_tipo",$request->tipo)->get();
                if(!$reviews){
                    return response()->json("no se ha encontrado ninguna review con ese id");
                }else{
                    return response()->json($reviews);
                }
                
            }else{
                $reviews = SuscripcionReview::all();
                return response()->json($reviews);
            }
        }catch(Exception $e){
            return response()->json(["error"=>"no se han podido mostrar las reviews",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(), $this->validar()[0],$this->validar()[1]);

        if($validar->fails()){
            return response()->json(["error"=> $validar->errors()->first()]);
        }
        try{
            $review = new SuscripcionReview();
            $review->id_usuario = $request->id_usuario;
            $review->id_tipo = $request->id_tipo;
            $review->review = $request->review;
            $review->save();

            return response()->json(["success"=>"reseña creada correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido crear la reseña",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $review = SuscripcionReview::where('id',$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la reseña"]);
            }else{
                return response()->json($review);
            }
            
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido mostrar la reseña",
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
            return response()->json(["error"=> $validar->errors()->first()]);
        }
        
        try{
            $review = SuscripcionReview::where('id',$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la reseña"]);
            }else{
                $review->id_usuario = $request->id_usuario;
                $review->id_tipo = $request->id_tipo;
                $review->review = $request->review;
                $review->save();

                return response()->json('reseña actualizada correctamente');
            }
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido editar la reseña",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $review = SuscripcionReview::where('id',$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la reseña"]);
            }else{
                $review->delete();
                return response()->json(["success"=>"reseña borrada correctamente"]);
            }
            
        }catch(Exception $e){
            return response()->json(["error"=>"no se ha podido borrar la reseña",
                                        "fallo"=>$e->getMessage()]);
        }
    }
}

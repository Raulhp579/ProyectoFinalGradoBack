<?php

namespace App\Http\Controllers;

use App\Models\ProductoReview;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoReviewController extends Controller
{

    public static function validar(){
        $reglas=[
            "id_usuario"=>"numeric|exists:users,id|required",
            "id_producto"=>"numeric|exists:productos,id|required",
            "review"=>"required|string"
        ];

        $mensajes=[
            "id_usuario.numeric"=>"el id usuario debe de ser de tipo numerico",
            "id_usuario.exists"=>"el usuario debe de existir",
            "id_usuario.required"=>"el id del usuario es requerido",
            "id_producto.numeric"=>"el id del producto debe de ser de tipo numerico",
            "id_producto.exists"=>"el producto debe de existir",
            "id_producto.required"=>"el id del producto es requerido",
            "review.required"=>"la review es requerida",
            "review.string"=>"la review debe de ser de tipo string"
        ];

        return [$reglas,$mensajes];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $reviews = ProductoReview::all();
            return response()->json($reviews);
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
        $validar = Validator::make($request->all(),$this->validar()[0],$this->validar()[1]);

        if($validar->fails()){
            return response()->json(["error"=>$validar->errors()->first()]);
        }
        try{
            $review = new ProductoReview();
            $review->id_usuario = $request->id_usuario;
            $review->id_producto = $request->id_producto;
            $review->review = $request->review;
            $review->save();

            return response()->json(["success"=>"review creada correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"no se han podido crear la review",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $review = ProductoReview::where("id",$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la review"]);
            }
            return response()->json($review);
        }catch(Exception $e){
            return response()->json(["error"=>"no se han podido mostrar la review",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validar = Validator::make($request->all(),$this->validar()[0],$this->validar()[1]);

        if($validar->fails()){
            return response()->json(["error"=>$validar->errors()->first()]);
        }
        try{
            $review = ProductoReview::where("id",$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la review"]);
            }
            $review->id_usuario = $request->id_usuario;
            $review->id_producto = $request->id_producto;
            $review->review = $request->review;
            $review->save();

            return response()->json(["success"=>"review actualizada correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"no se han podido actualizar la review",
                                        "fallo"=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $review = ProductoReview::where("id",$id)->first();
            if(!$review){
                return response()->json(["error"=>"no se ha podido encontrar la review"]);
            }
            $review->delete();
            return response()->json(["success"=>"review borrada correctamente"]);
        }catch(Exception $e){
            return response()->json(["error"=>"no se han podido borrar la review",
                                        "fallo"=>$e->getMessage()]);
        }
    }
}

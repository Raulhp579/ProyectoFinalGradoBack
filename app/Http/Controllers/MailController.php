<?php

namespace App\Http\Controllers;

use App\Mail\MailableConfig;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function enviarEmail(Request $request){
        try{
            //return response()->json($request);
            Mail::to($request->email)->send(new MailableConfig($request->remitente, $request->asunto, $request->cuerpo));
            return response()->json(["success"=>"correro enviado correctamente"]);
        }catch(Exception $e){
            return response()->json(['error'=>'Fallo en el envio del correo',
                                        'fallo'=>$e->getMessage()]);
        }
        
    }
}

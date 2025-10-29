<?php

namespace App\Http\Controllers;

use App\Models\EnvioServicio;
use Illuminate\Http\Request;

class EnvioServicioController extends Controller
{

    public function index()
    {

    }

    public function create(Request $request)
    {
        $es = new EnvioServicio();
        $es->nombre = $request["nombre"];
        $es->tiempo_envio = $request["tiempo_envio"];
        $es->coste_base = $request["coste_base"];
        $es->activo = $request["activo"];
        $es->id_usuario = $request["id_usuario"];

        $es->save();
    }


    public function store(Request $request)
    {

    }


    public function show(string $id)
    {
  
    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}

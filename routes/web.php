<?php

use App\Http\Controllers\EnvioServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/crearUsuario', [EnvioServicioController::class, "create"]) ->name("crearUsuario");
Route::put('/crearUsuario', [EnvioServicioController::class, "update"])->name("actualizarUsuario");
Route::put('/crearUsuario', [EnvioServicioController::class, "edit"])->name("editarUsuario");
Route::delete('/crearUsuario', [EnvioServicioController::class, "destroy"])->name("borrarUsuario");
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContratoProductoController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\VistasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//////////////////////////////////RUTAS DE CONTRATO//////////////////////////////////

route::get('/contrato', [ContratoController::class, 'getAll'])->name('contrato.get');
route::post('/contrato', [ContratoController::class, 'create'])->name('contrato.create');
route::put('/contrato/{id}', [ContratoController::class, 'update'])->name('contrato.update');
route::delete('/contrato/{id}',[ContratoController::class, 'delete'])->name('contrato.delete');
route::get('/contrato/{id}', [ContratoController::class, 'getById'])->name('contrato.getById');

/////////////////////////////////RUTAS CONTRATO PRODUCTO//////////////////////////////

route::get('/contrato_producto',[ContratoProductoController::class, 'getAll'])->name('contratoProducto.get');
route::post('/contrato_producto',[ContratoProductoController::class, 'create'])->name('contratoProducto.create');
route::put('/contrato_producto/{id}',[ContratoProductoController::class, 'update'])->name('contratoProducto.update');
route::delete('/contrato_producto/{id}',[ContratoProductoController::class, 'delete'])->name('contratoProducto.delete');
route::get('/contrato_producto/{id}',[ContratoProductoController::class, 'getById'])->name('contratoProducto.getById');


////////////////////////////////////RUTA CORREO//////////////////////////////////////////
Route::post('/correoEnviar',[MailController::class,'enviarEmail'])->name('correo.enviar');

/////////////////////////////////////RUTA A LAS VISTAS///////////////////////////////////////////
Route::get('/suscripcionVista',[VistasController::class,'SuscripcionVista']);
<?php

use App\Models\Contrato;
use App\Models\ContratoProducto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContratoProductoController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


//////////////////////////////////RUTAS DE CONTRATO//////////////////////////////////

route::get('/contrato', [ContratoController::class, 'getAll'])->name('contrato.get');
route::post('/contrato', [ContratoController::class, 'create'])->name('contrato.create');
route::put('/contrato', [ContratoController::class, 'update'])->name('contrato.update');
route::delete('/contrato',[ContratoController::class, 'delete'])->name('contrato.delete');

/////////////////////////////////RUTAS CONTRATO PRODUCTO//////////////////////////////

route::get('/contrato_producto',[ContratoProductoController::class, 'getAll'])->name('contratoProducto.get');
route::post('/contrato_producto',[ContratoProductoController::class, 'create'])->name('contratoProducto.create');
route::put('/contrato_producto',[ContratoProductoController::class, 'update'])->name('contratoProducto.update');
route::delete('/contrato_producto',[ContratoProductoController::class, 'delete'])->name('contratoProducto.delete');




/////////////////////////////////////RUTA A LAS VISTAS///////////////////////////////////////////

Route::get('/suscripcionVista',[VistasController::class,'SuscripcionVista']);
Route::get('/carrito',[VistasController::class,'CarritoVista']);
Route::get('/producto',[VistasController::class,'ProductoVista']);

Route::get('/suscripcionVista',[VistasController::class,'SuscripcionVista'])->name("suscripcion.vista");
Route::get('/', [VistasController::class, 'InicioVista'])->name('inicio.vista');


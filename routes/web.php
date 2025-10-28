<?php

use App\Http\Controllers\ProfileController;
use App\Models\Contrato;
use App\Models\ContratoProducto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

route::get('/contrato', [Contrato::class, 'getAll'])->name('contrato.get');
route::post('/contrato', [Contrato::class, 'create'])->name('contrato.create');
route::put('/contrato', [Contrato::class, 'update'])->name('contrato.update');
route::delete('/contrato',[Contrato::class, 'delete'])->name('contrato.delete');

/////////////////////////////////RUTAS CONTRATO PRODUCTO//////////////////////////////

route::get('/contrato_producto',[ContratoProducto::class, 'getAll'])->name('contratoProducto.get');
route::post('/contrato_producto',[ContratoProducto::class, 'create'])->name('contratoProducto.create');
route::put('/contrato_producto',[ContratoProducto::class, 'update'])->name('contratoProducto.update');
route::delete('/contrato_producto',[ContratoProducto::class, 'delete'])->name('contratoProducto.delete');

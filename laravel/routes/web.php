<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Http\Controllers\ClienteController;
Route::get('/', function () {
    return view('welcome');
});

//Ruta para el listado de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

//Ruta para el borrado del cliente actual
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

//Ruta para cargar la vista de edicción del cliente seleccionado
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

//Ruta para actualizar el cliente seleccionado
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

//Ruta para cargar la vista de insercción
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

//Ruta para insertar el nuevo cliente
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');


Route::get('/prueba-factorias', function () {
    
    $cliente = Cliente::factory()->count(10)->create();
    
    $mascota = Mascota::factory()->count(10)->create();

    return response()->json([
        'cliente' => $cliente,
        'mascota' => $mascota
    ]);
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /* 
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
*/

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }


    public function destroy($id)
    {
        //Con find sacamos el cliente con el id que le introducimos de la base de datos
        $cliente = Cliente::find($id);
        //Con el cliente recuperado lo boeeamos utilizando delete
        $cliente->delete();
        return redirect()->route('clientes.index')->with('succcess', 'Cliente borrado correctamente');
    }

    public function edit($id)
    {
        //Con find sacamos el cliente con el id que le introducimos de la base de datos
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        //Con find sacamos el cliente con el id que le introducimos de la base de datos
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('succcess', 'Cliente actualizado correctamente');

        $request->validate([
            'nombre' => 'required|string|max:255|min:8',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('succcess', 'Cliente creado correctamente');
    }

}

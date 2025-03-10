<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::all();
        return view('admin.clientes.index',compact('clientes')); // Asegúrate de que esta vista exista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create'); // Asegúrate de que esta vista exista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|max:255',
        'email' => 'required|email|unique:clientes,email',
        'telefono' => 'required|max:20', // Se agrega validación para el teléfono
    ]);

    $cliente = new Cliente();
    $cliente->nombre = $validated['nombre'];
    $cliente->email = $validated['email'];
    $cliente->telefono = $validated['telefono']; // Se guarda el teléfono
    $cliente->save();

    return redirect()->route('clientes.index')->with('success', "Cliente agregado con éxito");
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:clientes,email,' . $id,
    ]);

    // Buscar el cliente
    $cliente = Cliente::findOrFail($id);

    // Actualizar los datos
    $cliente->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete(); // Eliminar el cliente

        return redirect()->route('clientes.index');
    }
}

<?php

namespace App\Http\Controllers;
use \App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculosAdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('admin.vehiculos.index',compact('vehiculos')); // Asegúrate de que esta vista exista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create'); // Asegúrate de que esta vista exista
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
            'marca' => 'required|max:255',
            'modelo' => 'required|unique:vehiculos,modelo',
            'anio' => 'required', // Se agrega validación para el teléfono
            'precio' => 'required', // Se agrega validación para el teléfono
            'stock' => 'required', // Se agrega validación para el teléfono
        ]);
    
        $vehiculo = new Vehiculo();
        $vehiculo->marca = $validated['marca'];
        $vehiculo->modelo = $validated['modelo'];
        $vehiculo->anio = $validated['anio']; // Se guarda el teléfono
        $vehiculo->precio = $validated['precio']; // Se guarda el teléfono
        $vehiculo->stock = $validated['stock']; // Se guarda el teléfono
        $vehiculo->save();
    
        return redirect()->route('admin.vehiculos.index')->with('success', "Vehiculo agregado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('admin.vehiculos.edit',compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'marca' => 'required|max:255',
            'modelo' => 'required|unique:vehiculos,modelo',
            'anio' => 'required', // Se agrega validación para el teléfono
            'precio' => 'required', // Se agrega validación para el teléfono
            'stock' => 'required', // Se agrega validación para el teléfono
        ]);
    
        // Buscar el cliente
        $cliente = Vehiculo::findOrFail($id);
    
        // Actualizar los datos
        $cliente->update([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'precio' => $request->precio,
            'stock' => $request->stock
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.vehiculos.index')->with('success', 'Vehiculo actualizado correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete(); // Eliminar el cliente

        return redirect()->route('admin.vehiculos.index');
    }
}

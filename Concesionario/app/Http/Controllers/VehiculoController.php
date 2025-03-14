<?php

namespace App\Http\Controllers;
use \App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index',compact('vehiculos')); // Asegúrate de que esta vista exista
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
    
        return redirect()->route('vehiculos.index')->with('success', "Vehiculo agregado con exito");
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
        return view('vehiculos.edit',compact('vehiculo'));
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
    $request->validate([
        'marca' => 'required|max:255',
        'modelo' => 'required|unique:vehiculos,modelo,' . $id, // Ignorar el modelo actual
        'anio' => 'required|numeric',
        'precio' => 'required|numeric',
        'stock' => 'required|numeric|min:0'
    ]);

    $vehiculo = Vehiculo::findOrFail($id);
    
    $vehiculo->marca = $request->marca;
    $vehiculo->modelo = $request->modelo;
    $vehiculo->anio = $request->anio;
    $vehiculo->precio = $request->precio;
    $vehiculo->stock = $request->stock;
    
    $vehiculo->save();

    return redirect()->route('vehiculos.index')
        ->with('success', 'Vehículo actualizado correctamente.');
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

        return redirect()->route('vehiculos.index');
    }
}

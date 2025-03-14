<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $vehiculos = Vehiculo::all();

        return view ('ventas.create',compact('clientes','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        $user = Auth::user();
        
        // Verificar si el usuario tiene un cliente asociado
        if (!$user->cliente) {
            return back()
                ->withInput()
                ->with('error', 'No tienes un cliente asociado a tu cuenta.');
        }

        // Validación
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
            'precio' => 'required|numeric|min:0',
        ]);

        // Crear la venta
        $venta = Venta::create([
            'vehiculo_id' => $request->vehiculo_id,
            'cliente_id' => $user->cliente->id,
            'fecha_venta' => $request->fecha,
            'total' => $request->precio,
            'user_id' => $user->id
        ]);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta registrada exitosamente.');
    } catch (\Exception $e) {
        Log::error('Error al crear venta: ' . $e->getMessage());
        return back()
            ->withInput()
            ->with('error', 'Error al registrar la venta: ' . $e->getMessage());
    }
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

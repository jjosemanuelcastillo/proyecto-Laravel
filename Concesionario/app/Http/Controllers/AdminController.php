<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Venta;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Obtener las estadísticas
        $vehiculosCount = Vehiculo::count();
        $clientesCount = Cliente::count();
        $ventasCount = Venta::count();

        // Devolver la vista con las estadísticas
        return view('indexAdmin', compact('vehiculosCount', 'clientesCount', 'ventasCount'));
    }
}

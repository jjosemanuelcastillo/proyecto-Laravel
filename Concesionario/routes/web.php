<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculosAdminController;
use App\Http\Controllers\VentaAdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    // Ruta para la página de editar perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});


Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::get('/inicio', function () {
    $totalClientes = \App\Models\Cliente::count();
    $totalVehiculos = \App\Models\Vehiculo::count();
    $totalVentas = \App\Models\Venta::count();

    return view('index', compact('totalClientes', 'totalVehiculos', 'totalVentas'));
})->name('inicio');


// Rutas para Ventas







require __DIR__ . '/auth.php'; // Incluye las rutas de autenticación



// Middleware para rutas protegidas
Route::middleware(['auth'])->group(function () {

    // Redirigir al usuario autenticado al home (en lugar de dashboard)


    // Perfil del usuario
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Cerrar sesión
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('home'); // Redirige al home tras cerrar sesión
    })->name('logout');

    // Rutas para gestionar vehículos (CRUD)
    Route::resource('vehiculos', VehiculoController::class);

    // Rutas para gestionar clientes (CRUD)
    Route::resource('clientes', ClienteController::class);

    // Rutas para gestionar ventas (CRUD)
    Route::resource('ventas', VentaController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutas para Clientes
    Route::get('/', function () {
        $totalClientes = \App\Models\Cliente::count();
        $totalVehiculos = \App\Models\Vehiculo::count();
        $totalVentas = \App\Models\Venta::count();

        return view('indexAdmin', compact('totalClientes', 'totalVehiculos', 'totalVentas'));
    })->name('home'); // Define un nombre para la ruta
    Route::get('/clientesAdmin', [ClienteAdminController::class, 'index'])->name('admin.clientes.index');
    Route::get('/clientesAdmin/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientesAdminn', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientesAdmin/{cliente}', [ClienteAdminController::class, 'show'])->name('admin.clientes.show');
    Route::get('/clientesAdmin/{cliente}/ediAdmint', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientesAdminn/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientesAdmin/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/vehiculosAdmin', [VehiculoController::class, 'index'])->name('admin.vehiculos.index');
    Route::get('/vehiculosAdmin/createAdmin', [VehiculosAdminController::class, 'create'])->name('admin.vehiculos.create');
    Route::post('/vehiculosAdminn', [VehiculosAdminController::class, 'store'])->name('admin.vehiculos.store');
    Route::get('/vehiculosAdmin/{vehiculo}', [VehiculosAdminController::class, 'show'])->name('admin.vehiculos.show');
    Route::get('/vehiculosAdmin/{vehiculo}/editAdmin', [VehiculosAdminController::class, 'edit'])->name('admin.vehiculos.edit');
    Route::put('/vehiculosAdmin/{vehiculo}', [VehiculosAdminController::class, 'update'])->name('admin.vehiculos.update');
    Route::delete('/vehiculosAdmin/{vehiculo}', [VehiculoController::class, 'destroy'])->name('admin.vehiculos.destroy');

    Route::get('/ventasAdmin', [VentaAdminController::class, 'index'])->name('admin.ventas.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    // Rutas para Clientes
    Route::get('/home', function () {
        $totalClientes = \App\Models\Cliente::count();
        $totalVehiculos = \App\Models\Vehiculo::count();
        $totalVentas = \App\Models\Venta::count();

        return view('index', compact('totalClientes', 'totalVehiculos', 'totalVentas'));
    })->name('home'); // Define un nombre para la ruta
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
    Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
    Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
    Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
    Route::get('/vehiculos/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::put('/vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('/vehiculos/{vehiculo}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
    // Rutas para Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});



// Ruta de logout (debe estar fuera del middleware auth)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



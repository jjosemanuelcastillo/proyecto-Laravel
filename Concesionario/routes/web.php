<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;

// Rutas para Vehículos
Route::prefix('vehiculos')->name('vehiculos.')->group(function () {
    Route::get('/', [VehiculoController::class, 'index'])->name('index');
    Route::get('/create', [VehiculoController::class, 'create'])->name('create');
    Route::post('/', [VehiculoController::class, 'store'])->name('store');
    Route::get('/{vehiculo}', [VehiculoController::class, 'show'])->name('show');
    Route::get('/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('edit');
    Route::put('/{vehiculo}', [VehiculoController::class, 'update'])->name('update');
    Route::delete('/{vehiculo}', [VehiculoController::class, 'destroy'])->name('destroy');
});

// Rutas para Clientes
Route::prefix('clientes')->name('clientes.')->group(function () {
    Route::get('/create', [ClienteController::class, 'create'])->name('create');
    Route::get('/index', [ClienteController::class, 'index'])->name('index');
    Route::post('/', [ClienteController::class, 'store'])->name('store');
    Route::get('/{cliente}', [ClienteController::class, 'show'])->name('show');
    Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('edit');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('update');
    Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('destroy');
});

// Rutas para Ventas
Route::prefix('ventas')->name('ventas.')->group(function () {
    Route::get('/', [VentaController::class, 'index'])->name('index');
    Route::get('/create', [VentaController::class, 'create'])->name('create');
    Route::post('/', [VentaController::class, 'store'])->name('store');
    Route::get('/{venta}', [VentaController::class, 'show'])->name('show');
    Route::get('/{venta}/edit', [VentaController::class, 'edit'])->name('edit');
    Route::put('/{venta}', [VentaController::class, 'update'])->name('update');
    Route::delete('/{venta}', [VentaController::class, 'destroy'])->name('destroy');
});

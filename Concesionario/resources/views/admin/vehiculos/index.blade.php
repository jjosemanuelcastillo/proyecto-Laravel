@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Administrar Vehículos</h2>
        <a href="{{ route('admin.vehiculos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Vehículo
        </a>
    </div>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>€{{ number_format($vehiculo->precio, 2) }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('admin.vehiculos.edit', $vehiculo->id) }}" 
                           class="btn btn-sm btn-outline-primary">
                            Editar
                        </a>
                        <form action="{{ route('admin.vehiculos.destroy', $vehiculo->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este vehículo?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
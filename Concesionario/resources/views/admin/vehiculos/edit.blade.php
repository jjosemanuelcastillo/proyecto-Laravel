@extends('layouts.app')

@section('title', 'Editar Vehículo')

@section('content')
    <div class="container">
        <h1>Editar Vehículo</h1>
        
        <form action="{{ route('admin.vehiculos.update', $vehiculo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca', $vehiculo->marca) }}" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $vehiculo->modelo) }}" required>
            </div>
            <div class="mb-3">
                <label for="año" class="form-label">Año</label>
                <input type="number" name="año" id="año" class="form-control" value="{{ old('año', $vehiculo->año) }}" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $vehiculo->precio) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Vehículo</button>
        </form>
    </div>
@endsection

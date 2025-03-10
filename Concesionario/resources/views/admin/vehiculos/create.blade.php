@extends('layouts.app')

@section('title', 'Agregar Vehículo')

@section('content')
    <div class="container">
        <h1>Agregar Vehículo</h1>
        
        <form action="{{ route('admin.vehicles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="año" class="form-label">Año</label>
                <input type="number" name="año" id="año" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Vehículo</button>
        </form>
    </div>
@endsection

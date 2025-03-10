<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Vehiculo {{$vehiculo->marca}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Editar Vehiculo</h1>

    <div class="card shadow p-4">
        <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                    <label for="nombre" class="form-label">marca</label>
                    <input type="text" class="form-control" id="nombre" name="marca" value="{{ $vehiculo->marca }}" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $vehiculo->modelo }}" required>
                </div>
                <div class="mb-3">
                    <label for="anio" class="form-label">Año</label>
                    <input type="text" class="form-control" id="anio" name="anio" value="{{ $vehiculo->anio }}" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $vehiculo->precio }}"  required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $vehiculo->stock }}"  required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

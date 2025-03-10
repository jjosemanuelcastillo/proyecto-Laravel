<!doctype html>
<html lang="es">

<head>
    <title>Lista de Clientes</title>
    <meta charset="utf-8">
    <link rel="icon" href="../../../public/founder_icon-icons.com_76996.png" type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold text-primary">Lista de Clientes</h1>

        </div>

        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <div class="card shadow-lg p-4">
            <table class="table table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr class="table-light">
                        <td class="fw-bold">{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('admin.clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
            <a href="{{ route('home') }}" class="btn btn-info btn-sm">
                    <i class="bi bi-eye"></i> Volver a Menú Principal
                </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
</body>

</html>
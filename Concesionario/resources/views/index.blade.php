<!DOCTYPE html>
<html lang="es">

<head>
    <title>Panel Principal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../public/home-button_icon-icons.com_72700.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4e73df, #1cc88a);
            color: white;
        }

        .card {
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-weight: bold;
        }

        .btn {
            border-radius: 25px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center mb-5 fw-bold">Bienvenido al Sistema de Gestión</h1>
        @if(Auth::check())
        <p>Bienvenido, {{ Auth::user()->name }}!</p>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card bg-primary text-white shadow p-4">
                    <h3>Clientes</h3>
                    <p class="display-5">{{ $totalClientes }}</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-light text-primary fw-bold px-4 py-2">Ver Clientes</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white shadow p-4">
                    <h3>Vehículos</h3>
                    <p class="display-5">{{ $totalVehiculos }}</p>
                    <a href="{{ route('vehiculos.index') }}" class="btn btn-light text-success fw-bold px-4 py-2">Ver Vehículos</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark shadow p-4">
                    <h3>Ventas</h3>
                    <p class="display-5">{{ $totalVentas }}</p>
                    <a href="{{ route('ventas.index') }}" class="btn btn-dark fw-bold px-4 py-2">Ver Ventas</a>
                </div>
            </div>
        </div>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @else
        <p>No has iniciado sesión.</p>
        <a href="{{ route('login') }}" class="btn btn-success">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
        @endif
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
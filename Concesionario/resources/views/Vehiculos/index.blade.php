@extends('layouts.app')

@section('content')
    <h1>Lista de Vehículos</h1>
    <a href="{{ route('vehiculos.create') }}">Agregar Vehículo</a>
    <ul>
        @foreach($vehiculos as $vehiculo)
            <li>{{ $vehiculo->marca }} - {{ $vehiculo->modelo }} - ${{ $vehiculo->precio }}</li>
        @endforeach
    </ul>
@endsection

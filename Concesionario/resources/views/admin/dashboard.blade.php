<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta de Clientes -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Clientes</h3>
                        <p class="text-3xl font-bold mb-4">{{ $totalClientes }}</p>
                        <a href="{{ route('admin.clientes.index') }}" 
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Ver Clientes
                        </a>
                    </div>
                </div>

                <!-- Tarjeta de Vehículos -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Vehículos</h3>
                        <p class="text-3xl font-bold mb-4">{{ $totalVehiculos }}</p>
                        <a href="{{ route('admin.vehiculos.index') }}" 
                           class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Ver Vehículos
                        </a>
                    </div>
                </div>

                <!-- Tarjeta de Ventas -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">Ventas</h3>
                        <p class="text-3xl font-bold mb-4">{{ $totalVentas }}</p>
                        <a href="{{ route('admin.ventas.index') }}" 
                           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                            Ver Ventas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
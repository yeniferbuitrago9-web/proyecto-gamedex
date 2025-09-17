<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-600 flex items-center gap-2">
            <img src="{{ asset('images/logo.png') }}" alt="GameDex Logo" class="h-8 w-8">
            GameDex
        </h2>
    </x-slot>

    <div class="py-6 px-4 space-y-6">

        <!-- Banner principal -->
        <div class="bg-gradient-to-r from-blue-400 to-indigo-500 rounded-xl shadow-lg p-6 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-red mb-2">Bienvenido a GameDex!</h1>
                <p class="text-red text-lg">Explora, vende e intercambia tus artículos y juegos favoritos.</p>
            </div>
            <img src="{{ asset('images/banner-gaming.png') }}" alt="Banner Gaming" class="h-32">
        </div>

        <!-- Estadísticas rápidas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 text-center">
                <img src="{{ asset('images/products.png') }}" class="h-10 mx-auto mb-2" alt="Productos">
                <h2 class="text-gray-500 text-sm">Productos</h2>
                <p class="text-2xl font-bold text-blue-500">120</p>
            </div>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 text-center">
                <img src="{{ asset('images/sales.png') }}" class="h-10 mx-auto mb-2" alt="transaccione">
                <h2 class="text-gray-500 text-sm">transaccione</h2>
                <p class="text-2xl font-bold text-green-500">85</p>
            </div>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 text-center">
                <img src="{{ asset('images/exchange.png') }}" class="h-10 mx-auto mb-2" alt="carrito">
                <h2 class="text-gray-500 text-sm">carrito</h2>
                <p class="text-2xl font-bold text-yellow-500">32</p>
            </div>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 text-center">
                <img src="{{ asset('images/users.png') }}" class="h-10 mx-auto mb-2" alt="Usuarios">
                <h2 class="text-gray-500 text-sm">Usuarios</h2>
                <p class="text-2xl font-bold text-purple-500">58</p>
            </div>
        </div>

        <!-- Productos destacados -->
        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Productos Destacados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              @foreach($productos as $producto)
    <div>
        <h2>{{ $producto->nombre }}</h2>
        <a href="{{ route('producto.show', $producto->id_producto) }}">Ver</a>
        <a href="{{ route('producto.edit', $producto->id_producto) }}">Editar</a>
        <form action="{{ route('producto.destroy', $producto->id_producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </div>
@endforeach
            </div>
        </div>

        
        <!-- Accesos rápidos -->
        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Accesos Rápidos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <a href="{{ route('producto.create') }}" class="bg-blue-400 text-white p-5 rounded-xl shadow hover:bg-blue-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/add.png') }}" class="h-12 mb-2">
                    <span class="font-semibold">Añadir Producto</span>
                </a>
                <a href="{{ route('transaccione.index') }}" class="bg-green-400 text-white p-5 rounded-xl shadow hover:bg-green-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/sales.png') }}" class="h-12 mb-2">
                    <span class="font-semibold">Ver transaccione</span>
                </a>
                <a href="{{ route('carrito.index') }}" class="bg-yellow-400 text-white p-5 rounded-xl shadow hover:bg-yellow-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/exchange.png') }}" class="h-12 mb-2">
                    <span class="font-semibold">carrito</span>
                </a>
        
            </div>
        </div>
    </div>
</x-app-layout>

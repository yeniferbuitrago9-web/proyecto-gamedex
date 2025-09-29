<x-app-layout>
    

    <!-- Fondo principal -->
<div class="bg-gray-100 min-h-screen py-8 px-6 space-y-10 text-white">
        <!-- Banner principal -->
        <div class="bg-gradient-to-r from-blue-800 to-indigo-800 rounded-2xl shadow-lg p-8 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-extrabold text-white mb-3">¡Bienvenido a GameDex!</h1>
                <p class="text-blue-200 text-lg">Explora, vende e intercambia tus artículos y juegos favoritos.</p>
            </div>
            <img src="{{ asset('images/banner-gaming.png') }}" alt="Banner Gaming" class="h-64 rounded-lg shadow-md">
        </div>

        <!-- Estadísticas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <a href="{{ route('producto.index') }}" class="block">
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
            <img src="{{ asset('images/products.png') }}" class="h-24 mx-auto mb-3" alt="Productos">
            <h2 class="text-gray-500 text-sm">Productos</h2>
        </div>
    </a>
    <a href="{{ route('transaccione.index') }}" class="block">
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
                <img src="{{ asset('images/sales.png') }}" class="h-24 mx-auto mb-3" alt="Transacciones">
                <h2 class="text-gray-500 text-sm">Transacciones</h2>
            </div>
             </a>
              <a href="{{ route('carrito.index') }}" class="block">
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
            <img src="{{ asset('images/exchange.png') }}" class="h-24 mx-auto mb-3" alt="Carritos">
            <h2 class="text-gray-500 text-sm">Carrito</h2>
        </div>
    </a>

    <a href="{{ route('usuario.index') }}" class="block">
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6 text-center">
            <img src="{{ asset('images/users.png') }}" class="h-24 mx-auto mb-3" alt="Usuarios">
            <h2 class="text-gray-500 text-sm">Usuarios</h2>
        </div>
    </a>
</div>
        <!-- Productos destacados -->
        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Productos Destacados</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($productos as $producto)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5 flex flex-col">
                        @if($producto->imagen)
    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-contain">
@else
    <img src="{{ asset('images/productos/default.jpg') }}" alt="Sin imagen" class="w-full h-full object-contain">
@endif

                        <h2 class="text-lg font-semibold text-gray-800 mb-3">{{ $producto->nombre }}</h2>
                        <div class="flex justify-between mt-auto gap-2">
                            <a href="{{ route('producto.show', $producto->id_producto) }}" 
                               class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600 text-sm">Ver</a>
                            <a href="{{ route('producto.edit', $producto->id_producto) }}" 
                               class="bg-yellow-500 text-white px-3 py-2 rounded-lg hover:bg-yellow-600 text-sm">Editar</a>
                            <form action="{{ route('producto.destroy', $producto->id_producto) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600 text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Accesos rápidos -->
        <div>
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Accesos Rápidos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <a href="{{ route('producto.create') }}" 
                   class="bg-blue-400 text-white p-6 rounded-xl shadow hover:bg-blue-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/add.png') }}" class="h-24 mb-3">
                    <span class="font-semibold">Añadir Producto</span>
                </a>
                <a href="{{ route('transaccione.index') }}" 
                   class="bg-green-400 text-white p-6 rounded-xl shadow hover:bg-green-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/sales.png') }}" class="h-24 mb-3">
                    <span class="font-semibold">Ver Transacciones</span>
                </a>
                <a href="{{ route('carrito.index') }}" 
                   class="bg-yellow-400 text-white p-6 rounded-xl shadow hover:bg-yellow-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/exchange.png') }}" class="h-24 mb-3">
                    <span class="font-semibold">Ir a Carrito</span>
                </a>
                <a href="{{ route('usuario.index') }}" 
                   class="bg-purple-400 text-white p-6 rounded-xl shadow hover:bg-purple-500 flex flex-col items-center justify-center transition">
                    <img src="{{ asset('images/users.png') }}" class="h-24 mb-3">
                    <span class="font-semibold">Usuarios</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

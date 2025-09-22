<x-app-layout>
    <x-slot name="header">
            <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <h2 class="text-2xl font-bold text-blue-600">
            {{ $producto->nombre }}
        </h2>
    </x-slot>

   <div class="p-6 bg-white rounded-xl shadow-md flex flex-col md:flex-row gap-6">

  
    <div class="md:w-1/2 flex justify-center">
        @if($producto->imagen)
            <img src="{{ asset($producto->imagen) }}" 
                 alt="{{ $producto->nombre }}" 
                 class="w-80 h-64 object-contain rounded-lg shadow-md bg-gray-100 p-2">
        @else
            <img src="{{ asset('images/productos/default.jpg') }}" 
                 alt="Sin imagen" 
                 class="w-80 h-64 object-contain rounded-lg shadow-md bg-gray-100 p-2">
        @endif
    </div>
      <div class="md:w-1/2 flex flex-col justify-center">
            <p class="text-gray-700 mb-3">
                <strong>Categoría:</strong> {{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}
            </p>
            <p class="text-gray-700 mb-3">
                <strong>Usuario:</strong> {{ $producto->usuario->nombre ?? 'N/A' }}
            </p>
            <p class="text-gray-700 mb-3">
                <strong>Descripción:</strong> {{ $producto->descripcion ?? 'Sin descripción' }}
            </p>
            <form action="{{ route('carrito.store') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">
    <input type="number" name="cantidad" value="1" min="1"
           class="border rounded px-2 py-1 w-20">

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        🛒 Añadir al carrito
    </button>
</form>

            <a href="{{ route('producto.index') }}" 
               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 w-fit">
               ← Volver a productos
            </a>
        </div>
    </div>
</x-app-layout>
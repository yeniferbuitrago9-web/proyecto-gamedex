<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-blue-600">
            {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-xl shadow-md flex flex-col md:flex-row gap-6">
         <div class="md:w-1/2">
        @if($producto->imagen)
            <img src="{{ asset('images/' . $producto->imagen) }}" 
                 alt="{{ $producto->nombre }}" 
                class="max-h-64 w-auto object-contain rounded-lg shadow-md">
                 @else
    <img src="{{ asset('images/play5.png') }}" 
         alt="Sin imagen" 
        class="max-h-32 w-auto object-contain rounded-lg shadow-md">

        @endif
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

            <a href="{{ route('producto.index') }}" 
               class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 w-fit">
               ← Volver a productos
            </a>
        </div>
    </div>
</x-app-layout>
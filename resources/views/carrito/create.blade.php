<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <form action="{{ route('carrito.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block">Id</label>
                <input type="text" name="nombre" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label class="block">Fecha</label>
                <textarea name="descripcion" class="border p-2 w-full"></textarea>
            </div>
    
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
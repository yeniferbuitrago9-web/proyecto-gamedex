<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-6 px-8">
        <form action="{{ route('producto.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block">Nombre</label>
                <input type="text" name="nom_producto" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label class="block">Descripción</label>
                <textarea name="des_producto" class="border p-2 w-full"></textarea>
            </div>
            <div class="mb-4">
                <label class="block">Cantidad</label>
                <input type="number" name="cant_producto" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label class="block">Precio</label>
                <input type="number" step="0.01" name="pre_producto" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
        </form>
    </div>
</x-app-layout>
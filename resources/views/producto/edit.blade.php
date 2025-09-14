<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nom_producto" class="block text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nom_producto" id="nom_producto"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               value="{{ old('nom_producto', $producto->nom_producto) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="des_producto" class="block text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="des_producto" id="des_producto"
                                  class="w-full border-gray-300 rounded-md shadow-sm">{{ old('des_producto', $producto->des_producto) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="pre_producto" class="block text-gray-700 dark:text-gray-300">Precio</label>
                        <input type="number" name="pre_producto" id="pre_producto"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               value="{{ old('pre_producto', $producto->pre_producto) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="cant_producto" class="block text-gray-700 dark:text-gray-300">Cantidad</label>
                        <input type="number" name="cant_producto" id="cant_producto"
                               class="w-full border-gray-300 rounded-md shadow-sm"
                               value="{{ old('cant_producto', $producto->cant_producto) }}" required>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
    Actualizar
</button>
                        <a href="{{ route('producto.index') }}"
                           class="text-gray-600 dark:text-gray-300 hover:underline">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
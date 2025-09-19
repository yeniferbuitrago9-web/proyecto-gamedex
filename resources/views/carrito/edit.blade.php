<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-600">Editar Carrito</h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <form action="{{ route('carrito.update', $carrito) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="w-full border">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carrito->items as $item)
                        <tr>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>
                                <input type="number" name="cantidades[{{ $item->id_item }}]" 
                                       value="{{ $item->cantidad }}" min="1"
                                       class="border rounded px-2 py-1 w-20">
                            </td>
                            <td>${{ number_format($item->producto->precio, 0, ',', '.') }}</td>
                            <td>${{ number_format($item->cantidad * $item->producto->precio, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Guardar Cambios
            </button>
        </form>
    </div>
</x-app-layout>

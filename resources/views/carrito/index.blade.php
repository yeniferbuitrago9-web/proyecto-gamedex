@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Mi Carrito</h1>

    @if($carrito->isEmpty())
        <p class="text-gray-500">Tu carrito está vacío.</p>
        <a href="{{ route('carrito.index') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded inline-block mt-4">
            Ver productos
        </a>
    @else
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Producto</th>
                    <th class="border p-2 text-center">Cantidad</th>
                    <th class="border p-2 text-right">Precio</th>
                    <th class="border p-2 text-right">Subtotal</th>
                    <th class="border p-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ $carrito->id_carrito }}</td> 
                        <td class="py-2 px-4 border">{{ $carrito->fecha_carrito }}</td>
                        <td class="border p-2 text-center">
                            <form action="{{ route('carrito.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-right">
            <p class="text-lg font-bold">
                Total: ${{ number_format($carrito->sum(fn($i) => $i->cantidad * $i->producto->precio), 0, ',', '.') }}
            </p>

            <a href="{{ route('checkout') }}" 
               class="bg-green-500 text-white px-4 py-2 rounded mt-2 inline-block">
                Proceder al pago
            </a>
        </div>
    @endif
</div>
@endsection
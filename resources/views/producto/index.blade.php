@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>

    <a href="{{ route('producto.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Agregar Producto</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Nombre</th>
                    <th class="py-2 px-4 border">Precio</th>
                    <th class="py-2 px-4 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td class="py-2 px-4 border">{{ $producto->id_producto }}</td> 
                        <td class="py-2 px-4 border">{{ $producto->nom_producto }}</td>
                         <td class="py-2 px-4 border">{{ $producto->pre_producto }}</td>
                        <td class="py-2 px-4 border">
                            <form action="{{ route('producto.destroy', $producto) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                            </form>
                            <a href="{{ route('producto.edit', $producto) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
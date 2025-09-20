<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <div class="container mx-auto px-4 py-6">
            {{-- Título --}}
            <h1 class="text-2xl font-bold mb-6 text-blue-800">
                Lista de Productos
            </h1>

            {{-- Si no hay productos --}}
            @if($productos->isEmpty())
                <p class="text-gray-600">No hay productos registrados.</p>
            @else
                {{-- Botón agregar producto --}}
                <a href="{{ route('producto.create') }}" class="btn-primary mb-4 inline-block">
                    ➕ Agregar Producto
                </a>

                {{-- Mensaje de éxito --}}
                @if(session('ok'))
                    <div class="alert-success">
                        {{ session('ok') }}
                    </div>
                @endif

                {{-- Tabla de productos --}}
                <div class="overflow-x-auto">
                    <table id="productos" class="table-productos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Garantía</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td> 
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>${{ number_format($producto->precio, 2) }}</td>
                                    <td>{{ $producto->dias_garantia }} días</td>
                                    <td>{{ $producto->categoria->nombre_categoria ?? '-' }}</td>
                                    <td class="flex gap-2">
                                        {{-- Añadir al carrito --}}
                                        <form action="{{ route('carrito.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">
                                            <input type="hidden" name="cantidad" value="1">
                                            <button type="submit" class="btn-success">🛒</button>
                                        </form>

                                        {{-- Editar --}}
                                        <a href="{{ route('producto.edit', $producto) }}" class="btn-dark">✏️</a>

                                        {{-- Eliminar --}}
                                        <form action="{{ route('producto.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Eliminar producto?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger">❌</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </x-slot>
</x-app-layout>

{{-- jQuery + DataTables (CDN) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(function() {
    $('#productos').DataTable({
        pageLength: 20,
        dom: 'Bfrtip',
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
        },
        buttons: [
            { extend: 'copy', text: 'Copiar', className: 'btn-dark' },
            { extend: 'csv', text: 'CSV', className: 'btn-dark' },
            { extend: 'excel', text: 'Excel', className: 'btn-success' },
            { extend: 'pdf', text: 'PDF', className: 'btn-danger' },
            { extend: 'print', text: 'Imprimir', className: 'btn-primary' }
        ]
    });
});
</script>

<x-app-layout>
    <x-slot name="header">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>
    @if($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
    <p>
          <a href="{{ route('producto.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Agregar Producto</a>

    @if(session('ok'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('ok') }}
        </div>
    @endif
       <table id="productos" class="min-w-full bg-white border">
            <thead>
                   <tr>
                            <th class="py-2 px-4 border">Nombre</th>
                            <th class="py-2 px-4 border">Descripción</th>
                            <th class="py-2 px-4 border">Cantidad</th>
                            <th class="py-2 px-4 border">Precio</th>
                            <th class="py-2 px-4 border">Garantia</th>
                            <th class="py-2 px-4 border">Categoria</th>
                            <th class="py-2 px-4 border">Acciones</th>
                        </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td class="py-2 px-4 border">{{ $producto->nombre }}</td> 
                        <td class="py-2 px-4 border">{{ $producto->descripcion }}</td>
                        <td class="py-2 px-4 border">{{ $producto->cantidad }}</td>
                        <td class="py-2 px-4 border">{{ $producto->precio }}</td>
                         <td class="py-2 px-4 border">{{ $producto->dias_garantia }}</td>
                         <td>{{ $producto->categoria->nombre_categoria ?? '-' }}</td>
                        <td class="py-2 px-4 border">
                            <form action="{{ route('carrito.store') }}" method="POST" style="display:inline">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id_producto }}">
                    <input type="hidden" name="cantidad" value="1">
                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">🛒 Añadir</button>
                     </form>

                            <a href="{{ route('producto.edit', $producto) }}" class="bg-black-500 text-white px-3 py-1 rounded">✏️ </a>
                            <form action="{{ route('producto.destroy', $producto) }}" method="POST" style="display:inline" onsubmit="return confirm('¿eliminar?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-black-500 text-white px-3 py-1 rounded">❌</button>
                                </form>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    @endif
</div>


 {{-- jQuery + DataTables (CDN) --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet"
href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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
buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
});
});
</script>
 </x-slot>
</x-app-layout>
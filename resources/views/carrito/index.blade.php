<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-600">
            Mi Carrito
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        @if($carrito && $carrito->items->count())
            <table id="carrito" class="display nowrap w-full">
                <thead>
                    
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($carrito->items as $item)
                        <tr>
                            <td>{{ $item->producto->nombre }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->producto->precio, 0, ',', '.') }}</td>
                            <td>${{ number_format($item->cantidad * $item->producto->precio, 0, ',', '.') }}</td>
                             <td class="py-2 px-4 border">
        
                            </form>
                            <a href="{{ route('carrito.edit', $carrito) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('carrito.item.destroy', $item->id_item) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar producto?')">
                              @csrf
                              @method('DELETE')
                             <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                              </form>

                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tu carrito está vacío.</p>
        @endif
    </div>
    <form action="{{ route('carrito.vaciar') }}" method="POST" 
      onsubmit="return confirm('¿Seguro que quieres vaciar todo el carrito?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
        Vaciar carrito
    </button>
</form>

    {{-- jQuery + DataTables --}}
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
            $('#carrito').DataTable({
                pageLength: 10,
                responsive: true,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
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
        <table id="carrito" class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Id</th>
                    <th class="border p-2 text-center">Fecha</th>
                    <th class="border p-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
              @foreach($carrito as $carrito)
    <tr>
        <td class="py-2 px-4 border">{{ $item->id_carrito }}</td> 
        <td class="py-2 px-4 border">{{ $item->fecha_carrito }}</td>
        <td class="border p-2 text-center">
            <form action="{{ route('carrito.destroy', $item->id_carrito) }}" method="POST">
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
                Total: ${{ $carrito->sum(function($i) {
    return $i->cantidad * $i->producto->precio;
}) }}
            </p>

            <a href="{{ route('checkout') }}" 
               class="bg-green-500 text-white px-4 py-2 rounded mt-2 inline-block">
                Proceder al pago
            </a>
        </div>
    @endif
</div>
@endsection
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
$('#carrito').DataTable({
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
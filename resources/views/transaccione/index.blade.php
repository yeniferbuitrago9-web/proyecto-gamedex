<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Lista de transaccione</h1>
    @if($transaccione->isEmpty())
        <p>No hay transaccione registrados.</p>
    @else
    <p>
          <a href="{{ route('transaccione.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Agregar transaccione</a>

    @if(session('ok'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('ok') }}
        </div>
    @endif
       <table id="transaccione" class="min-w-full bg-white border">
            <thead>
                   <tr>
                            <th class="py-2 px-4 border">Tipo</th>
                            <th class="py-2 px-4 border">Usuario</th>
                            <th class="py-2 px-4 border">Producto</th>
                            <th class="py-2 px-4 border">Monto</th>
                            <th class="py-2 px-4 border">Fecha</th>
                            <th class="py-2 px-4 border">Estado</th>
                            <th class="py-2 px-4 border">Acciones</th>
                        </tr>
            </thead>
            <tbody>
                @foreach($transaccione as $transaccione)
                    <tr>
                        <td class="py-2 px-4 border">{{ $transaccione->tipo }}</td> 
                        <td class="py-2 px-4 border">{{ $transaccione->usuario->nombre ?? '' }}</td>
                        <td class="py-2 px-4 border">{{ $transaccione->producto->nombre ?? '' }}</td>
                        <td class="py-2 px-4 border">{{ $transaccione->monto }}</td>
                         <td class="py-2 px-4 border">{{ $transaccione->fecha->format('Y-m-d') }}</td>
                         <td class="py-2 px-4 border">{{ $transaccione->estado }}</td>
                        <td class="py-2 px-4 border">
        
                            </form>
                            <a href="{{ route('transaccione.edit', $transaccione) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                            <form action="{{ route('transaccione.destroy', $transaccione) }}" method="POST" style="display:inline" onsubmit="return confirm('¿eliminar?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
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
$('#transaccione').DataTable({
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
<x-app-layout>
    <x-slot name="header">
           <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Usuarios</h1>
    @if($usuarios->isEmpty())
        <p>No hay usuarios registrados.</p>
    @else
    <p>
          <a href="{{ route('usuario.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Agregar Usuario</a>

    @if(session('ok'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('ok') }}
        </div>
    @endif
       <table id="usuarios" class="min-w-full bg-white border">
            <thead>
                   <tr>
                            <th class="border px-2 py-1">ID</th>
            <th class="border px-2 py-1">Documento</th>
            <th class="border px-2 py-1">Nombre</th>
            <th class="border px-2 py-1">Email</th>
            <th class="border px-2 py-1">Teléfono</th>
            <th class="border px-2 py-1">Acciones</th>
                        </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
        <tr>
            <td class="border px-2 py-1">{{ $usuario->id_usuario }}</td>
            <td class="border px-2 py-1">{{ $usuario->doc_usuario }}</td>
            <td class="border px-2 py-1">{{ $usuario->nombre }}</td>
            <td class="border px-2 py-1">{{ $usuario->email }}</td>
            <td class="border px-2 py-1">{{ $usuario->telefono }}</td>
            <td class="border px-2 py-1">
                <a href="{{ route('usuario.edit', $usuario) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️</a>

                <form action="{{ route('usuario.destroy', $usuario) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('¿Eliminar usuario?')">❌</button>
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
$('#usuarios').DataTable({
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
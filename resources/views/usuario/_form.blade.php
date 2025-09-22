@php
    $val = fn($key, $default = '') => old($key, $usuario->{$key} ?? $default);
@endphp

<div class="space-y-4">
    <div>
        <label class="block text-sm font-semibold text-blue-400">Documento</label>
        <input type="text" name="doc_usuario" 
               value="{{ $val('doc_usuario') }}" 
               required
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400">
    </div>

    <div>
        <label class="block text-sm font-semibold text-blue-400">Nombre</label>
        <input type="text" name="nombre" 
               value="{{ $val('nombre') }}" 
               required
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400">
    </div>

    <div>
        <label class="block text-sm font-semibold text-blue-400">Email</label>
        <input type="email" name="email" 
               value="{{ $val('email') }}" 
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400">
    </div>

    <div>
        <label class="block text-sm font-semibold text-blue-400">Contraseña</label>
        <input type="password" name="password" 
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400"
               {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label class="block text-sm font-semibold text-blue-400">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" 
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400"
               {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label class="block text-sm font-semibold text-blue-400">Teléfono</label>
        <input type="text" name="telefono" 
               value="{{ $val('telefono') }}" 
               class="w-full p-2 rounded-md border border-gray-600 bg-gray-800 text-white focus:border-blue-500 focus:ring focus:ring-blue-400">
    </div>
</div>

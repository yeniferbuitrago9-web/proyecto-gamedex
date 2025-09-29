@php
    $val = fn($key, $default = '') => old($key, $usuario->{$key} ?? $default);
@endphp

<div class="space-y-4">
    <div>
        <label class="block text-base font-medium mb-1">Documento *</label>
        <input type="text" name="doc_usuario" 
               value="{{ $val('doc_usuario') }}" 
               required
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Nombre *</label>
        <input type="text" name="nombre" 
               value="{{ $val('nombre') }}" 
               required
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Email *</label>
        <input type="email" name="email" 
               value="{{ $val('email') }}" 
               required
               class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Contraseña *</label>
        <input type="password" name="password" 
               class="w-full border rounded px-3 py-2"
               {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Confirmar Contraseña *</label>
        <input type="password" name="password_confirmation" 
               class="w-full border rounded px-3 py-2"
               {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Teléfono</label>
        <input type="text" name="telefono" 
               value="{{ $val('telefono') }}" 
               class="w-full border rounded px-3 py-2">
    </div>
</div>

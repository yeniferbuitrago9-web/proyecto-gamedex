@php
    $val = fn($key, $default = '') => old($key, $usuario->{$key} ?? $default);
@endphp

<div class="space-y-4">
    <div>
        <label>Documento</label>
        <input type="text" name="doc_usuario" value="{{ $val('doc_usuario') }}" required class="border p-2 w-full">
    </div>

    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $val('nombre') }}" required class="border p-2 w-full">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ $val('email') }}" class="border p-2 w-full">
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="password" class="border p-2 w-full" {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="border p-2 w-full" {{ isset($usuario) ? '' : 'required' }}>
    </div>

    <div>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ $val('telefono') }}" class="border p-2 w-full">
    </div>
</div>

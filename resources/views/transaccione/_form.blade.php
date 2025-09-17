@php
    $val = fn($key, $default = '') => old($key, isset($transaccione) ? ($transaccione->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">
    <div>
        <label for="tipo" class="block font-medium text-gray-700">Tipo de transacción</label>
       <select name="tipo_transaccion" id="tipo_transaccion" class="border rounded px-2 py-1 w-full">>
    @foreach($tipos as $tipo)
        <option value="{{ $tipo->value }}">{{ $tipo->name }}</option>
    @endforeach
</select>
        @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Usuario</label>
        <select name="id_usuario" class="border rounded px-2 py-1 w-full">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" {{ $val('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                    {{ $usuario->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Producto</label>
        <select name="id_producto" class="border rounded px-2 py-1 w-full">
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" {{ $val('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Método de Pago</label>
        <input type="text" name="metodo_pago" value="{{ $val('metodo_pago') }}" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label>Monto</label>
        <input type="number" name="monto" value="{{ $val('monto') }}" step="0.01" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label>Garantía</label>
        <input type="text" name="garantia" value="{{ $val('garantia') }}" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label>Fecha</label>
        <input type="date" name="fecha" value="{{ $val('fecha') ? $val('fecha')->format('Y-m-d') : '' }}" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label>Estado</label>
        <input type="text" name="estado" value="{{ $val('estado') }}" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $submitButtonText ?? 'Guardar' }}
        </button>
    </div>
</div>

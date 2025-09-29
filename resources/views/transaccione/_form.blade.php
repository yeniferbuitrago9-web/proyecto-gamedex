@php
    use Carbon\Carbon;

    $val = fn($key, $default = '') => old($key, isset($transaccione) ? ($transaccione->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">
    <div>
        <label for="tipo" class="block text-base font-medium mb-1">Tipo de transacción *</label>
        <select name="tipo" id="tipo" class="border rounded px-2 py-1 w-full">
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->value }}" {{ $val('tipo') == $tipo->value ? 'selected' : '' }}>
                    
                    {{ $tipo->name }}
                </option>
            @endforeach
        </select>
        @error('tipo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Usuario *</label>
        <select name="id_usuario" class="border rounded px-2 py-1 w-full">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" {{ $val('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                    {{ $usuario->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-base font-medium mb-1">Producto *</label>
        <select name="id_producto" class="border rounded px-2 py-1 w-full">
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" {{ $val('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select>
    </div>

   <div>
    <label for="metodo_pago" class="block text-base font-medium mb-1">Método de Pago *</label>
    <select name="metodo_pago" id="metodo_pago" class="border rounded px-2 py-1 w-full">
        @foreach($metodos as $metodo)
            <option value="{{ $metodo->value }}" {{ $val('metodo_pago') == $metodo->value ? 'selected' : '' }}>
                {{ ucfirst($metodo->value) }}
            </option>
        @endforeach
    </select>
    @error('metodo_pago') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

    <div>
        <label for="monto" class="block text-base font-medium mb-1">Monto *</label>
        <input type="number" name="monto" value="{{ $val('monto') }}" step="0.01" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label for="garantia" class="block text-base font-medium mb-1">Garantía *</label>
        <input type="text" name="garantia" value="{{ $val('garantia') }}" class="border rounded px-2 py-1 w-full">
    </div>

    <div>
        <label for="fecha" class="block text-base font-medium mb-1">Fecha *</label>
        <input type="date" name="fecha"
            value="{{ $val('fecha') ? ($val('fecha') instanceof \Carbon\Carbon ? $val('fecha')->format('Y-m-d') : Carbon::parse($val('fecha'))->format('Y-m-d')) : '' }}"
            class="border rounded px-2 py-1 w-full">
    </div>

  <div>
    <label for="estado" class="block text-base font-medium mb-1">Estado *</label>
    <select name="estado" id="estado" class="border rounded px-2 py-1 w-full">
        @foreach($estados as $estado)
            <option value="{{ $estado->value }}" {{ $val('estado') == $estado->value ? 'selected' : '' }}>
                {{ ucfirst($estado->value) }}
            </option>
        @endforeach
    </select>
    @error('estado') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>


</div>

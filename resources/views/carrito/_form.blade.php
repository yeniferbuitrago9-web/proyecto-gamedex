@php
    // Para edición, $item llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($item) ? ($item->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    {{-- Selección de producto --}}
    <div>
        <label class="block text-sm font-medium mb-1">Producto *</label>
        <select name="producto_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona un producto --</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}"
                    {{ $val('producto_id') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->nombre }} - ${{ number_format($producto->precio, 0, ',', '.') }}
                </option>
            @endforeach
        </select>
        @error('producto_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Cantidad --}}
    <div>
        <label class="block text-sm font-medium mb-1">Cantidad *</label>
        <input type="number" min="1" name="cantidad" value="{{ $val('cantidad', 1) }}"
               class="w-full border rounded px-3 py-2" required>
        @error('cantidad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Precio unitario (solo lectura, se llena con el producto) --}}
    <div>
        <label class="block text-sm font-medium mb-1">Precio Unitario</label>
        <input type="text" id="precio_unitario" value="{{ $item->producto->precio ?? '' }}"
               class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
    </div>

    {{-- Subtotal (cantidad × precio) --}}
    <div>
        <label class="block text-sm font-medium mb-1">Subtotal</label>
        <input type="text" id="subtotal" value=""
               class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
    </div>
</div>

{{-- Script para calcular subtotal dinámicamente --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectProducto = document.querySelector('select[name="producto_id"]');
        const inputCantidad = document.querySelector('input[name="cantidad"]');
        const inputPrecio = document.getElementById('precio_unitario');
        const inputSubtotal = document.getElementById('subtotal');

        // precios en un objeto para acceso rápido
        const precios = {
            @foreach($productos as $producto)
                "{{ $producto->id_producto }}": {{ $producto->precio }},
            @endforeach
        };

        function actualizarSubtotal() {
            const productoId = selectProducto.value;
            const cantidad = parseInt(inputCantidad.value) || 0;
            const precio = precios[productoId] || 0;

            inputPrecio.value = precio.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
            inputSubtotal.value = (cantidad * precio).toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
        }

        selectProducto.addEventListener('change', actualizarSubtotal);
        inputCantidad.addEventListener('input', actualizarSubtotal);
    });
</script>

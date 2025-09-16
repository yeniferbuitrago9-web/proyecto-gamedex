@php
    // Para edición, $producto llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($producto) ? ($producto->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium mb-1">Nombre *</label>
        <input type="text" name="nombre" value="{{ $val('nombre') }}"
               class="w-full border rounded px-3 py-2" required>
        @error('nombre')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Descripción</label>
        <textarea name="descripcion" class="w-full border rounded px-3 py-2">{{ $val('descripcion') }}</textarea>
        @error('descripcion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

      <div>
            <label class="block text-sm font-medium mb-1">Precio *</label>
            <input type="number" step="0.01" name="precio" value="{{ $val('precio') }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('precio')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Cantidad *</label>
            <input type="number" name="cantidad" value="{{ $val('cantidad') }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('cantidad')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

         <div>
            <label class="block text-sm font-medium mb-1">Garantia *</label>
            <input type="number" name="dias_garantia" value="{{ $val('dias_garantia') }}"
                   class="w-full border rounded px-3 py-2" required>
            @error('dias_garantia')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <select name="categoria_id" id="categoria_id" required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
    <option value="">Seleccione una categoría</option>
    @foreach($categorias as $c)
        <option value="{{ $c->id_categoria }}"
            @selected(old('categoria_id', $producto->categoria_id ?? '') == $c->id_categoria)>
            {{ $c->nombre_categoria }}
        </option>
    @endforeach
</select>

      
    </div>
</div>

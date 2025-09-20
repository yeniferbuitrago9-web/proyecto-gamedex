<div class="space-y-4">
    <div>
        <label class="form-label">Nombre *</label>
        <input type="text" name="nombre"
               value="{{ old('nombre', $producto->nombre ?? '') }}"
               class="form-input" required>
        @error('nombre')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-textarea">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="form-label">Precio *</label>
        <input type="number" step="0.01" name="precio"
               value="{{ old('precio', $producto->precio ?? '') }}"
               class="form-input" required>
        @error('precio')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="form-label">Cantidad *</label>
            <input type="number" name="cantidad"
                   value="{{ old('cantidad', $producto->cantidad ?? '') }}"
                   class="form-input" required>
            @error('cantidad')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="form-label">Garantía *</label>
            <input type="number" name="dias_garantia"
                   value="{{ old('dias_garantia', $producto->dias_garantia ?? '') }}"
                   class="form-input" required>
            @error('dias_garantia')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="form-label">Categoría *</label>
        <select name="categoria_id" id="categoria_id" class="form-select" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $c)
                <option value="{{ $c->id_categoria }}"
                        @selected(old('categoria_id', $producto->categoria_id ?? '') == $c->id_categoria)>
                    {{ $c->nombre_categoria }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

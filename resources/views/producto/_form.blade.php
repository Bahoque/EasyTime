@csrf
@unless(Route::currentRouteName() === 'producto.edit')

    <!-- Código -->
    <div class="mb-4">
        <label class="block text-gray-700">Código</label>
        <input type="text" name="COD_PROD"
            value="{{ old('COD_PROD', $producto->COD_PROD ?? '') }}"
            class="w-full border-gray-300 rounded" required>
        @error('COD_PROD')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
@endunless    

<!-- Nombre -->
<div class="mb-4">
    <label class="block text-gray-700">Nombre</label>
    <input type="text" name="NOM_PROD"
           value="{{ old('NOM_PROD', $producto->NOM_PROD ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('NOM_PROD')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Descripción -->
<div class="mb-4">
    <label class="block text-gray-700">Descripción</label>
    <textarea name="DESCRIPCION_PROD"
              maxlength="60"
              class="w-full border-gray-300 rounded"
              placeholder="Máximo 60 caracteres">{{ old('DESCRIPCION_PROD', $producto->DESCRIPCION_PROD ?? '') }}</textarea>
    @error('DESCRIPCION_PROD')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- Precio -->
<div class="mb-4">
    <label class="block text-gray-700">Precio</label>
    <input type="number" step="0.01" name="PRECIO_PROD"
           value="{{ old('PRECIO_PROD', $producto->PRECIO_PROD ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('PRECIO_PROD')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Cantidad -->
<div class="mb-4">
    <label class="block text-gray-700">Cantidad</label>
    <input type="number" name="CANTIDAD_PROD"
           value="{{ old('CANTIDAD_PROD', $producto->CANTIDAD_PROD ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('CANTIDAD_PROD')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- Inventario -->
@unless(Route::currentRouteName() === 'producto.edit')
    <div class="mb-4">
        <label for="INVENTARIO_ID_INVENTARIO" class="block text-gray-700">Inventario</label>
        <select name="INVENTARIO_ID_INVENTARIO" id="INVENTARIO_ID_INVENTARIO"
                class="w-full border-gray-300 rounded" required>
            <option value="">-- Seleccione --</option>
            <option value="13" {{ old('INVENTARIO_ID_INVENTARIO', $producto->INVENTARIO_ID_INVENTARIO ?? '') == 13 ? 'selected' : '' }}>13</option>
            <option value="14" {{ old('INVENTARIO_ID_INVENTARIO', $producto->INVENTARIO_ID_INVENTARIO ?? '') == 14 ? 'selected' : '' }}>14</option>
            <option value="15" {{ old('INVENTARIO_ID_INVENTARIO', $producto->INVENTARIO_ID_INVENTARIO ?? '') == 15 ? 'selected' : '' }}>15</option>
            <option value="16" {{ old('INVENTARIO_ID_INVENTARIO', $producto->INVENTARIO_ID_INVENTARIO ?? '') == 16 ? 'selected' : '' }}>16</option>
        </select>
        @error('INVENTARIO_ID_INVENTARIO')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
@endunless





<!-- Botón -->
<div class="flex justify-end">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        {{ $btnText }}
    </button>
</div>

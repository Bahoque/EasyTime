@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@csrf

<!-- Nombre Serv -->
<div class="mb-4">
    <label class="block text-gray-700">Nombre</label>
    <input type="text" name="NOM_SERV"
           value="{{ old('NOM_SERV', $servicio->NOM_SERV ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('NOM_SERV')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Descripción -->
<div class="mb-4">
    <label class="block text-gray-700">Descripción</label>
    <textarea name="DESCP_SERV"
              maxlength="60"
              class="w-full border-gray-300 rounded"
              placeholder="Máximo 60 caracteres">{{ old('DESCP_SERV', $servicio->DESCP_SERV ?? '') }}</textarea>
    @error('DESCP_SERV')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- Precio -->
<div class="mb-4">
    <label class="block text-gray-700">Precio</label>
    <input type="number" step="0.01" name="PRECIO_SERV"
           value="{{ old('PRECIO_SERV', $servicio->PRECIO_SERV ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('PRECIO_SERV')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Duracion -->
<div class="mb-4">
    <label class="block text-gray-700">Duración del Servicio</label>
    <input type="text" name="DURACION_SERV"
           value="{{ old('DURACION_SERV', $servicio->DURACION_SERV ?? '') }}"
           class="w-full border-gray-300 rounded"
           maxlength="60"
           placeholder="Ej: 30min, 1h 15min"
           required>
    @error('DURACION_SERV')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- Botón -->
<div class="flex justify-end">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        {{ $btnText }}
    </button>
</div>

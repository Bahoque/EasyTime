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

<!-- Nombre usuario -->
<div class="mb-4">
    <label class="block text-gray-700">Nombre</label>
    <input type="text" name="NOM_USER"
           value="{{ old('NOM_USER', $usuario->NOM_USER ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('NOM_USER')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Apellido usuario -->
<div class="mb-4">
    <label class="block text-gray-700">Apellido</label>
    <input type="text" name="APE_USER"
           value="{{ old('APE_USER', $usuario->APE_USER ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('APE_USER')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Tipo documento -->
<div class="mb-4">
    <label class="block text-gray-700">Tipo de Documento</label>
    <select name="TIPO_DOC"
            class="w-full border-gray-300 rounded"
            required>
        <option value="">Seleccione un tipo</option>
        <option value="Cedula Ciudadania" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'Cedula Ciudadania' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
        <option value="Tarjeta Identidad" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'Tarjeta Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
        <option value="Permiso de Proteccion Temporal" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'Permiso de Proteccion Temporal' ? 'selected' : '' }}>Permiso de Protección Temporal</option>
        <option value="Cedula Extranjeria" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'Cedula Extranjeria' ? 'selected' : '' }}>Cédula de Extranjería</option>
        <option value="Pasaporte" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
        <option value="NIT" {{ old('TIPO_DOC', $usuario->TIPO_DOC ?? '') == 'NIT' ? 'selected' : '' }}>NIT</option>
    </select>
    @error('TIPO_DOC')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Numero documento usuario -->
<div class="mb-4">
    <label class="block text-gray-700">Número de Documento</label>
    <input type="text" name="NUMERO_DOC"
           value="{{ old('NUMERO_DOC', $usuario->NUMERO_DOC ?? '') }}"
           class="w-full border-gray-300 rounded"
           maxlength="20"
           placeholder="Ej: 123456789"
           required>
    @error('NUMERO_DOC')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- telefono -->
<div class="mb-4">
    <label class="block text-gray-700">Numero de Telefono</label>
    <input type="number" step="0.01" name="TEL_USER"
           value="{{ old('TEL_USER', $usuario->TEL_USER ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('TEL_USER')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Rol -->
<div class="mb-4">
    <label class="block text-gray-700">Rol</label>
    <select name="ROL_USER" class="w-full border-gray-300 rounded" required>
        <option value="">Seleccione un Rol</option>
        <option value="Administrador" {{ old('ROL_USER', $usuario->ROL_USER ?? '') == 'Administrador' ? 'selected' : '' }}>Administrador</option>
        <option value="Cliente" {{ old('ROL_USER', $usuario->ROL_USER ?? '') == 'Cliente' ? 'selected' : '' }}>Cliente</option>
        <option value="Jefe de Patio" {{ old('ROL_USER', $usuario->ROL_USER ?? '') == 'Jefe de Patio' ? 'selected' : '' }}>Jefe de Patio</option>
    </select>

    @error('ROL_USER')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Correo -->
<div class="mb-4">
    <label class="block text-gray-700">Correo</label>
    <input type="text" name="CORREO_USER"
           value="{{ old('CORREO_USER', $usuario->CORREO_USER ?? '') }}"
           class="w-full border-gray-300 rounded" required>
    @error('CORREO_USER')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- Botón -->
<div class="flex justify-end">
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
        {{ $btnText }}
    </button>
</div>
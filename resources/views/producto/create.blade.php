<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Producto') }}
        </h2>
</x-slot>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
    <form action="#" method="POST" class="space-y-4">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" 
                   class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                   required>
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="3"
                      class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                      required></textarea>
        </div>

        <!-- Fecha de caducidad -->
        <div>
            <label for="fecha_caducidad" class="block text-sm font-medium text-gray-700">Fecha de caducidad</label>
            <input type="date" id="fecha_caducidad" name="fecha_caducidad"
                   class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                   required>
        </div>

        <!-- Precio -->
        <div>
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" step="0.01" id="precio" name="precio"
                   class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                   required>
        </div>

        <!-- Cantidad -->
        <div>
            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad"
                   class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                   required>
        </div>

        <!-- Botón -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-4 py-2 bg-gray-200 text-black rounded-md hover:bg-blue-500">
                Guardar
            </button>
        </div>
    </form>
</div>
</x-app-layout>

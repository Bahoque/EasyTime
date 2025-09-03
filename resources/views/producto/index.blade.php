<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

  <!-- <div class="py-12">
      <div class="bg-white shadow-xl sm:rounded-lg p-6"> -->

        <!-- Botón para agregar producto -->
        <div class="flex justify-end mb-4">
          <a href="{{ route('producto.create') }}"
             class="px-4 py-2 bg-green-600 text-black rounded hover:bg-green-700">
            Agregar Producto
          </a>
        </div>

        @if ($productos->isEmpty())
          <p>No hay productos disponibles.</p>
        @else
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nombre</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Descripcion</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Precio</th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Cantidad</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($productos as $producto)
                  <tr>
                    <td class="px-6 py-4">{{ $producto->NOM_PROD }}</td>
                    <td class="px-6 py-4">{{ $producto->DESCRIPCION_PROD }}</td>
                    <td class="px-6 py-4">{{ $producto->PRECIO_PROD }}</td>
                    <td class="px-6 py-4">{{ $producto->CANTIDAD_PROD }}</td>

                    <td class="px-6 py-4 flex space-x-2">
        <a href="{{ route('producto.edit', $producto->ID_PRODUCTO) }}"
           class="px-3 py-1 bg-blue-500 text-green rounded hover:bg-blue-600">
          Editar
        </a>

        <form action="{{ route('producto.destroy', $producto->ID_PRODUCTO) }}" method="POST"
              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
          @csrf
          @method('DELETE')
          <button type="submit"
                  class="px-3 py-1 bg-red-500 text-black rounded hover:bg-red-600">
            Eliminar
          </button>
        </form>
      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif

      </div>
    </div>
  </div>
</x-app-layout>

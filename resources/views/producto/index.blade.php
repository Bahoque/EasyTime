<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Contenedor superior con búsqueda + botones -->
                <div class="flex justify-end items-center mb-3 space-x-3">
                    <!-- Botón agregar producto -->
                    <a href="{{ route('producto.create') }}"
                       class="bg-green-400 text-white px-4 py-2 rounded-md shadow-md transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-green-500">
                        Agregar Producto
                    </a>

                    <!-- Lupa de búsqueda -->
                    <div class="flex items-center">
                        <button id="btnBuscar"
                                class="p-2 rounded-full bg-gray-200 hover:bg-gray-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 text-gray-600"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1116.65 16.65z" />
                            </svg>
                        </button>

                        <input id="inputBuscar" type="text"
                               class="ml-2 hidden border rounded px-2 py-1"
                               placeholder="Buscar..." />
                    </div>

                    <!-- Aquí DataTables pondrá el botón Exportar -->
                    <div id="exportarWrapper" class="flex items-center"></div>
                </div>

                @if ($productos->isEmpty())
                    <p class="p-4">No hay productos disponibles.</p>
                @else
                    <div class="overflow-x-auto">
                        <table id="productos" class="display" style="width:100%">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Descripcion</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Precio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Cantidad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Accion</th>
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
                                               class="bg-sky-300 px-3 py-1 rounded shadow transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-sky-500">
                                                Editar
                                            </a>

                                            <form action="{{ route('producto.destroy', $producto->ID_PRODUCTO) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-300 px-3 py-1 rounded shadow transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-red-500">
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

    {{-- jQuery + DataTables (CDN) --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function () {
            let table = $('#productos').DataTable({
                pageLength: 20,
                dom: 'Brtip', // quitamos buscador nativo
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        className: 'bg-blue-500 text-white px-4 py-2 rounded-md shadow hover:bg-blue-600',
                        buttons: [
                            { extend: 'copy', text: 'Copiar' },
                            { extend: 'csv', text: 'CSV' },
                            { extend: 'excel', text: 'Excel' },
                            { extend: 'pdf', text: 'PDF' },
                            { extend: 'print', text: 'Imprimir' }
                        ]
                    }
                ]
            });

            // Insertar el botón "Exportar" justo al lado de Agregar Producto y la lupa
            table.buttons().container().appendTo('#exportarWrapper');

            // Mostrar/ocultar input al dar click en la lupa
            $('#btnBuscar').on('click', function () {
                $('#inputBuscar').toggleClass('hidden').focus();
            });

            // Conectar input con búsqueda de DataTables
            $('#inputBuscar').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
</x-app-layout>

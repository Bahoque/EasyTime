<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Mensajes de sesión --}}
                @if (session('error'))
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('ok'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('ok') }}
                    </div>
                @endif

                {{-- Controles superiores --}}
                <div class="flex justify-end items-center mb-3 space-x-3">
                    <a href="{{ route('servicio.create') }}"
                       class="bg-green-400 text-white px-4 py-2 rounded-md shadow-md transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-green-500">
                        Crea un servicio
                    </a>

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

                    <div id="exportarWrapper" class="flex items-center"></div>
                </div>

                {{-- Tabla de servicios --}}
                @if ($servicio->isEmpty())
                    <p class="p-4">No hay servicios disponibles.</p>
                @else
                    <div class="overflow-x-auto">
                        <table id="servicio" class="display" style="width:100%">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Servicio</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Descripción</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Duración</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Costo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($servicio as $servicios)
                                    <tr>
                                        <td class="px-6 py-4">{{ $servicios->NOM_SERV }}</td>
                                        <td class="px-6 py-4">{{ $servicios->DESCP_SERV }}</td>
                                        <td class="px-6 py-4">{{ $servicios->DURACION_SERV }}</td>
                                        <td class="px-6 py-4">{{ $servicios->PRECIO_SERV }}</td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <a href="{{ route('servicio.edit', $servicios->ID_SERVICIO) }}"
                                               class="bg-sky-300 px-3 py-1 rounded shadow transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-sky-500">
                                                Editar
                                            </a>

                                            <form action="{{ route('servicio.destroy', $servicios->ID_SERVICIO) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">
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

    {{-- Scripts de DataTables --}}
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
            let table = $('#servicio').DataTable({
                pageLength: 20,
                dom: 'Brtip',
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

            table.buttons().container().appendTo('#exportarWrapper');

            $('#btnBuscar').on('click', function () {
                $('#inputBuscar').toggleClass('hidden').focus();
            });

            $('#inputBuscar').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
</x-app-layout>
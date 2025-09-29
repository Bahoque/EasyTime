<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('usuario.update', $usuario->ID_USER) }}" method="POST">
                    @method('PUT')
                    @include('usuario._form', ['btnText' => 'Actualizar Usuario'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
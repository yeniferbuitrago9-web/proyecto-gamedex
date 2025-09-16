<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-8">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white p-6 shadow sm:rounded-lg">
                            <form action="{{ route('usuario.store') }}" method="POST" class="space-y-6">
                                @csrf
                                @include('usuario._form', [
                                     'usuario' => null,
                                    
                                    
                                ])

                                <div class="pt-4 flex gap-3">
                                <button class="px-4 py-2 bg-red-500 text-white rounded">Actualizar</button>
                                    <a href="{{ route('usuario.index') }}"
                                       class="px-4 py-2 border rounded">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

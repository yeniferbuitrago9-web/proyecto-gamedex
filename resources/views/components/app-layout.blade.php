<div>
    <div class="min-h-screen bg-gray-100">

        {{-- Banner de Jetstream --}}
        <x-banner />

        {{-- Menú de navegación --}}
        @livewire('navigation-menu')

        {{-- Encabezado --}}
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        {{-- Contenido principal --}}
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</div>
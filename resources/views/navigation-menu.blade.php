<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/gamedexito.jpg') }}" alt="GameDex Logo" class="h-16 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-gray-200 hover:text-blue-400">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('producto.index') }}" :active="request()->routeIs('producto.*')" class="text-gray-200 hover:text-blue-400">
                        {{ __('Productos') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('usuario.index') }}" :active="request()->routeIs('usuario.*')" class="text-gray-200 hover:text-blue-400">
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('transaccione.index') }}" :active="request()->routeIs('transaccione.*')" class="text-gray-200 hover:text-blue-400">
                        {{ __('Transacciones') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                </div>

               <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link href="{{ route('carrito.index') }}" :active="request()->routeIs('carrito.*')" class="text-gray-200 hover:text-blue-400 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="currentColor" 
             viewBox="0 0 24 24" 
             class="w-5 h-5">
          <path d="M2.25 3a.75.75 0 000 1.5h1.386l2.94 10.681a2.25 2.25 0 002.163 1.569h8.736a2.25 2.25 0 002.163-1.569l1.74-6.34A1.5 1.5 0 0019.977 6H6.615l-.375-1.364A.75.75 0 005.512 4.5H2.25zM9 21a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm9 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
        <span>Carrito</span>
    </x-nav-link>
</div>


            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-gray-900 hover:text-blue-400 focus:outline-none focus:bg-gray-800 active:bg-gray-800 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-blue-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-blue-400 transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

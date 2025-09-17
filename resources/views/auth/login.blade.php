<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 px-4">
        <!-- Contenedor del login -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
            
            <!-- Logo y nombre -->
            <div class="flex flex-col items-center mb-6">
                <!-- Espacio para logo -->
                <div class="w-24 h-24 bg-gray-200 rounded-full mb-4 flex items-center justify-center">
                    <!-- Aquí luego pones tu logo -->
                    <span class="text-gray-500 text-sm">Logo</span>
                </div>
                <h1 class="text-3xl font-bold text-blue-600">GameDex</h1>
            </div>

            <!-- Validación de errores -->
            <x-validation-errors class="mb-4" />

            <!-- Mensajes de sesión -->
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div class="flex flex-col">
                    <x-label 
                        for="email" 
                        value="{{ __('Email') }}" 
                        class="text-gray-700 text-sm mb-1" 
                    />
                    <x-input 
                        id="email"  
                        class="text-gray-700 text-base w-full rounded-lg border border-gray-300 placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400"  
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        placeholder="correo@ejemplo.com" 
                    />
                </div>

                <!-- Password -->
                <div class="flex flex-col">
                    <x-label 
                        for="password" 
                        value="{{ __('Password') }}" 
                        class="text-gray-700 text-sm mb-1" 
                    />
                    <x-input 
                        id="password" 
                        class="text-gray-700 text-base w-full rounded-lg border border-gray-300 placeholder-gray-400 focus:ring-blue-400 focus:border-blue-400"  
                        type="password" 
                        name="password" 
                        required 
                        placeholder="********" 
                    />
                </div>

                <!-- Recordarme -->
                <div class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <label for="remember_me" class="ml-2 text-gray-600 text-sm">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <!-- Botón y enlace -->
                <div class="flex flex-col sm:flex-row sm:justify-between items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline mb-3 sm:mb-0" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

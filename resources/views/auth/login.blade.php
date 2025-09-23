<x-guest-layout>
    <div class="flex flex-col justify-center items-center py-16">

        <!-- Contenedor del login -->
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

            <!-- Logo y nombre -->
            <div class="flex flex-col items-center mb-6">
                <div class="mb-4">
                    <img src="{{ asset('images/gamedexito.jpg') }}" 
                         alt="Logo Gamedexito" 
                         class="w-24 h-24 rounded-full shadow-md border-2 border-blue-800">
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
                        class="bg-blue-50 text-black text-base w-full rounded-lg border border-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-600 transition duration-300"  
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
                        class="bg-blue-50 text-black text-base w-full rounded-lg border border-gray-300 placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-600 transition duration-300"  
                        type="password" 
                        name="password" 
                        required 
                        placeholder="********" 
                    />
                </div>

                <!-- Recordarme -->
                <div class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <label for="remember_me" class="ml-3 text-black text-sm">
                        {{ __('Recordar contraseña') }}
                    </label>
                </div>

              <!-- Botón y enlace -->
<div class="flex flex-col items-center mt-4 space-y-4">
    @if (Route::has('password.request'))
       <a class="text-sm text-blue-700 hover:text-blue-900 hover:underline transition duration-200" href="{{ route('password.request') }}">
            {{ __('Olvidaste tu contraseña?') }}
       </a>
    @endif

    <x-button class="w-full sm:w-auto bg-black hover:bg-gray-800 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:shadow-lg transition duration-300">
        {{ __('Iniciar sesion') }}
    </x-button>
</div>


            </form>
        </div>
    </div>
</x-guest-layout>

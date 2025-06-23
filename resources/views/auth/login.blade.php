<x-guest-layout>
    <x-authentication-card>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        {{-- Mensaje de errores --}}
        <x-validation-errors class="mb-4" />

        {{-- Mensaje de estado --}}
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div>
                <x-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full rounded-md" type="email" name="email"
                         :value="old('email')" required autofocus autocomplete="username" />
            </div>

            {{-- Contraseña --}}
            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full rounded-md" type="password" name="password"
                         required autocomplete="current-password" />
            </div>

            {{-- Recordarme --}}
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            {{-- Acciones --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline hover:text-indigo-800 transition"
                       href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class="w-full sm:w-auto justify-center">
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>

            {{-- Registro --}}
            <div class="mt-6 text-center">
                <span class="text-sm text-gray-600">¿No tienes una cuenta?</span>
                <a href="{{ route('register') }}"
                   class="text-sm text-indigo-600 hover:text-indigo-800 font-medium underline transition">
                    Regístrate aquí
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

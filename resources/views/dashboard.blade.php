<x-app-layout>
    <div class="bg-gradient-to-br from-indigo-100 via-white to-indigo-50 py-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden lg:grid lg:grid-cols-2 lg:gap-0">

                <!-- Imagen decorativa -->
                <div class="flex items-center justify-center bg-white p-6 lg:p-10">
                    <img src="{{ asset('images/undraw_certification_i2m0.png') }}"
                         alt="Bienvenida"
                         class="w-25 h-auto max-w-md object-contain rounded-xl">
                </div>

                <!-- Contenido -->
                <div class="flex flex-col justify-center p-6 lg:p-12 bg-white">
                    <div class="flex items-center space-x-3 mb-6">
                        <x-application-logo class="h-10 w-10 text-indigo-600" />
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 leading-tight">Hola {{ Auth::user()->name }} 👋</h1>
                            <p class="text-sm text-indigo-500 font-medium">Bienvenido al Sistema de Cursos</p>
                        </div>
                    </div>

                    <p class="text-gray-600 text-base leading-relaxed mb-8">
                        Aquí podrás explorar todos los ciclos académicos disponibles, ver los cursos por cada ciclo, acceder a los detalles y realizar tu matrícula de forma rápida y sencilla.
                        Este sistema está diseñado para ofrecerte una experiencia intuitiva y eficiente durante tu vida académica.
                    </p>

                    <a href="{{ route('ciclos.index') }}"
                       class="inline-flex items-center justify-center mt-4 px-6 py-3 bg-indigo-600 text-white text-base font-semibold rounded-xl shadow-md hover:bg-indigo-700 hover:scale-105 transition duration-300 w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Explorar Ciclos Académicos
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

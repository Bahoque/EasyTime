<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyTime</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="font-sans antialiased bg-gray-50">

    <div class="relative min-h-screen">

        <!-- Barra superior -->
        <div class="flex justify-between items-center border border-gray-100 p-4 bg-white shadow-sm">
            <!-- Logo -->
            <div>
                <img src="{{ asset('imagen/logo.png') }}" alt="logo EasyTime" width="100px">
            </div>

            <!-- Navegación -->
            <nav class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-3 py-2 text-gray-800 rounded-md transition hover:text-black/70">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 text-gray-800 rounded-md transition hover:text-black/70">Acceso</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-3 py-2 text-gray-800 rounded-md transition hover:text-black/70">Registro</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
            
            <!-- Columna izquierda -->
            <div class="col-span-1 p-6 border border-gray-300 rounded-lg bg-white shadow">
                <h2 class="text-xl font-semibold">Eslogan</h2>
                <p class="mt-2 text-sm">Descripción de la empresa aquí.</p>
                <p class="mt-4 text-sm font-semibold">Frases de llamado a la acción.</p>
                <div class="mt-4">
                    <img src="{{ asset('imagen/gif_registro.gif') }}" alt="gif señalando el botón de registro" class="w-full h-auto">
                </div>
            </div>

            <!-- Columna derecha -->
            <div class="col-span-2 space-y-6" x-data="{ activeTab: 'productos' }">
                
                <!-- Botones -->
                <div class="flex justify-center space-x-8 p-4 bg-white border border-gray-300 rounded-lg shadow">
                    <button 
                        @click="activeTab = 'productos'" 
                        :class="activeTab === 'productos' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800'"
                        class="px-8 py-3 rounded-lg transition font-semibold">
                        Productos
                    </button>
                    <button 
                        @click="activeTab = 'servicios'" 
                        :class="activeTab === 'servicios' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800'"
                        class="px-8 py-3 rounded-lg transition font-semibold">
                        Servicios
                    </button>
                    <button 
                        @click="activeTab = 'citas'" 
                        :class="activeTab === 'citas' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-800'"
                        class="px-8 py-3 rounded-lg transition font-semibold">
                        Citas
                    </button>
                </div>

                <!-- Contenedor dinámico -->
                <div class="p-6 border border-gray-300 rounded-lg bg-white shadow">
                    
                    <!-- Productos -->
                    <div x-show="activeTab === 'productos'">
                        <h3 class="font-semibold text-lg mb-4">Galería de Productos</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="grid gap-4">
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt=""></div>
                            </div>
                            <div class="grid gap-4">
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt=""></div>
                            </div>
                            <div class="grid gap-4">
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt=""></div>
                            </div>
                            <div class="grid gap-4">
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt=""></div>
                                <div><img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <!-- Servicios (Carrusel) -->
                    <div x-show="activeTab === 'servicios'" x-cloak>
                        <h3 class="font-semibold text-lg mb-4">Nuestros Servicios</h3>
                        <div id="default-carousel" class="relative w-full" data-carousel="slide">
                            <!-- Wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                </div>
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                                </div>
                            </div>
                            <!-- Indicadores -->
                            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Controles -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Anterior</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                                    <svg class="w-4 h-4 text-white" aria-hidden="true" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Siguiente</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Citas -->
                    <div x-show="activeTab === 'citas'" x-cloak>
                        <h3 class="font-semibold text-lg mb-4">Agenda tu Cita</h3>
                        <div class="bg-gray-100 h-40 flex items-center justify-center rounded">
                            📅 Calendario / Formulario
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

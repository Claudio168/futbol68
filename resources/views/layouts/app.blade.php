<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Consulta estadísticas en vivo de LaLiga, Premier League, Champions y más. Análisis de goles, corners y rendimiento para apuestas deportivas.">

    <meta property="og:title" content="Estadísticas de Fútbol en Vivo | LaLiga, Premier y Más">
    <meta property="og:description" content="Consulta datos de goles, tarjetas, corners y rendimiento de equipos en vivo. Ideal para análisis de apuestas deportivas.">
    <meta property="og:image" content="{{ asset('miniatura.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
   

    <title>⚽ Estadísticas de Fútbol en Vivo | LaLiga, Premier, Champions y Más</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('estilos.css') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles


</head>

<body class="font-sans antialiased">
    <h1 style="display: none;">Estadísticas de Fútbol para apuestas deportivas</h1>
    <section style="display: none;">
        <p>Las mejores estadísticas de fútbol de LaLiga, Premier League, Bundesliga, Primeira Liga, Serie A, Champions League, Copa Libertadores y más.</p>
    </section>
    <div style="background-color: #3D8361;" class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="dark:bg-green-800">
            <div class="sm:max-w-7xl sm:mx-auto sm:py-6 sm:px-4 lg:px-8 lg:pt-1">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <footer>
        <p>&copy; <span id="currentYear"></span> Claudio González Delgado. Todos los derechos reservados.</p>
        <p>Contacto: <a href="mailto:claudio@futbol168.net">claudio@futbol168.net</a></p>
    </footer>
    <script>
        document.getElementById('currentYear').innerText = new Date().getFullYear();
    </script>
    @stack('modals')

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="{{ asset('js.js') }}"></script>

</body>

</html>
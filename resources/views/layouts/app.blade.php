<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Futbol168') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image">

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
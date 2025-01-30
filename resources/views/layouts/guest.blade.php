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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <h1 style="display: none;">Estadísticas de Fútbol para apuestas deportivas</h1>
    <section style="display: none;">
        <p>Las mejores estadísticas de fútbol de LaLiga, Premier League, Bundesliga, Primeira Liga, Serie A, Champions League, Copa Libertadores y más.</p>
    </section>
    <div class="font-sans  text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
<x-slot name="header"> 
    <div class="overflow-x-auto" id="horizontal-scroll">
        <div class="flex mt-3" id="nav-items">
           
        @if(isset($ruta_resultado))
            <div class="flex-none w-30 p-2" id="resultado">

                <x-nav-link href="{{ route($ruta_resultado) }}" :active="request()->routeIs($ruta_resultado)">
                    Resultado
                </x-nav-link>
            </div>
            @endif
            
            @if(isset($ruta_goles))
            <div class="flex-none w-30 p-2" id="goles">
                <x-nav-link href="{{ route($ruta_goles) }}" :active="request()->routeIs($ruta_goles)">
                    Goles menos/más
                </x-nav-link>
            </div>
            @endif
           
            @if(isset($ruta_corners))
            <div class="flex-none w-30 p-2" id="corners">

                <x-nav-link href="{{ route($ruta_corners) }}" :active="request()->routeIs($ruta_corners)">
                    Corners
                </x-nav-link>
            </div>
            @endif
            @if(isset($ruta_tarjetas))
            <div class="flex-none w-30 p-2" id="tarjetas">

                <x-nav-link href="{{ route($ruta_tarjetas) }}" :active="request()->routeIs($ruta_tarjetas)">
                    Tarjetas
                </x-nav-link>
            </div>
            @endif
            @if(isset($ruta_fouls))
            <div class="flex-none w-30 p-2" id="fouls">

                <x-nav-link href="{{ route($ruta_fouls) }}" :active="request()->routeIs($ruta_fouls)">
                    Fouls
                </x-nav-link>
            </div>
            @endif
            @if(isset($ruta_ambos_marcan))
            <div class="flex-none w-30 p-2" id="ambosmarcan">

                <x-nav-link href="{{ route($ruta_ambos_marcan) }}" :active="request()->routeIs($ruta_ambos_marcan)">
                    Ambos Marcan
                </x-nav-link>
            </div>
            @endif
           
            @if(isset($ruta_ht_ft))
            <div class="flex-none w-30 p-2" id="ht_ft">

                <x-nav-link href="{{ route($ruta_ht_ft) }}" :active="request()->routeIs($ruta_ht_ft)">
                   HalfTime/FullTime
                </x-nav-link>
            </div>
            @endif

            @if(isset($ruta_disparo_arco))
            <div class="flex-none w-30 p-2" id="disparos">

                <x-nav-link href="{{ route($ruta_disparo_arco) }}" :active="request()->routeIs($ruta_disparo_arco)">
                Tiros a Puerta
                </x-nav-link>
            </div>
            @endif
           
        </div>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtenemos el elemento que contiene la lista horizontal
        const navContainer = document.querySelector('.overflow-x-auto');

        // Verificamos si ya existe un valor de scroll guardado
        const scrollPos = localStorage.getItem('navScrollPosition');

        if (scrollPos) {
            // Si existe, aplicamos el scroll guardado
            navContainer.scrollLeft = parseInt(scrollPos);
        }

        // Escuchamos el evento scroll y guardamos la posición
        navContainer.addEventListener('scroll', function() {
            localStorage.setItem('navScrollPosition', navContainer.scrollLeft);
        });
    });
</script>

</x-slot>
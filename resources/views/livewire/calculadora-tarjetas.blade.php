<div x-data="{ reportsOpen: false }" class="calcorner overflow-x-auto bg-gray-900 mb-2 mt-3 m-2 rounded-lg border">
    <!-- Encabezado del acordeón -->
    <div @click="reportsOpen = !reportsOpen" class="bg-gray-900 p-4 cursor-pointer flex justify-between items-center">
        <h2 class="text-white mx-2 mt-1">Calculadora de Tarjetas</h2>
        <!-- Icono para cuando el acordeón está cerrado -->
        <svg x-show="!reportsOpen" class="hidden md:block w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <!-- Icono para cuando el acordeón está abierto -->
        <svg x-show="reportsOpen" class="hidden md:block w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>
    <!-- Contenido del acordeón -->
    <div x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.400ms class="p-4 bg-gray-900">
        <div class="flex">
            <select wire:model.live="local" class="m-2 seleccion">
                <option value="todos">Local</option>
                @foreach($teams as $team)
                <option class="text-left">{{ $team}}</option>
                @endforeach
            </select>
            <select wire:model.live="visita" class="m-2 seleccion">
                <option value="todos">Visita</option>
                @foreach($teams as $team)
                <option class="text-left">{{$team}}</option>
                @endforeach
            </select>
            <select wire:model.live="arbitro" class="m-2 seleccion">
                <option value="todos">Árbitro</option>
                @foreach($arbitros as $arbitro)
                <option class="text-left">{{ $arbitro->fixture_referee}}</option>
                @endforeach
                <option value="otro">Otro...</option>
            </select>

            @if($tarjetasEsperadas)
            @if($idLocal == $idVisita)
            <div class="text-4xl text-white flex items-center space-x-2">
                <p class="text-sm ml-1 truncate">*Los equipos no pueden ser iguales &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
            @else
            <div class="text-4xl text-white flex items-center space-x-2">
                <img class="logoEquipo h-12 m-2" src="https://media.api-sports.io/football/teams/{{$idLocal}}.png" alt="Local Team Logo">
                <img class="logoEquipo h-12 m-2" src="/vs.png" alt="Local Team Logo">
                <img class="logoEquipo h-12 m-2" src="https://media.api-sports.io/football/teams/{{$idVisita}}.png" alt="Visiting Team Logo">
                <p class="text-sm ml-1 truncate">Para este partido se esperan {{$tarjetasEsperadas}} tarjetas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </div>
            @endif

            @endif
        </div>
    </div>
</div>

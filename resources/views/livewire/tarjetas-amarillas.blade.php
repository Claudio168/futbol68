<div class="bg-gray-900">
    <div class="overflow-x-auto">
        @php
        $currentYear = now()->year; // Obtiene el año actual
        @endphp

        @if($countMaches > 30 && ($temporada == $currentYear || $temporada == $currentYear - 1))
        <livewire:calculadora-tarjetas :nombreModelo="$auxModel" />
        @endif
        <div class="flex">
            <select class="seleccion selAnio" wire:model.live="temporada">
            @foreach($anios  as $anio)
                <option value="{{ $anio }}"> {{ $anio }} </option>
                @endforeach
            </select>
            <select class="seleccion" wire:model.live="team">
                <option value="">Team</option>
                <option value="">Todos...</option>
                @foreach($teams as $team)
                <option>{{ $team}}</option>
                @endforeach

            </select>
            <select class="seleccion selAnio" wire:model.live="lugar">
                <option value="ambos">Lugar</option>
                <option value="ambos">Ambos...</option>
                <option value="local">Local</option>
                <option value="visita">Visita</option>

            </select>
            <select class="seleccion" wire:model.live="total">
                <option value="totalPartido">Total Partido</option>
                <option value="totalEquipo">Solo Equipo Seleccionado</option>


            </select>
            <select class="seleccion" wire:model.live="param">
                <option value="tarjetas-amarillas">Tarjetas amarillas</option>
                <option value="tarjetas-rojas">Tarjetas rojas</option>
                <option value="tarjetas-arbitro">Árbitro</option>

            </select>
           
        </div>
    </div>

    <div class="overflow-x-auto table-container">
        <table id="customers">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th>Árbitro</th>
                    <th>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">Tarjetas 🟨</p>
                        </div>
                    </th>
                    <th>+0,5</th>
                    <th>+1,5</th>
                    <th>+2,5</th>
                    <th>+3,5</th>
                    <th>+4,5</th>
                    <th>+5,5</th>
                    <th>+6,5</th>
                   
                </tr>
            </thead>
            <tbody>
                @php
                $acumAma = 0;
                $acumRojas = 0;
                $totalPartidos = count($partidos); // Obtener el total de partidos
                @endphp
                @foreach($partidos as $indice => $partido)
                @php
                // Sumar tarjetas amarillas y rojas de ambos equipos
                $sumaTarjetasA = ($partido->yellow_cards ?? 0) + ($partido->yellow_cards2 ?? 0);
                $sumaTarjetasR = ($partido->red_cards ?? 0) + ($partido->red_cards2 ?? 0);

                // Acumular la suma de tarjetas amarillas y rojas
                $acumAma += $sumaTarjetasA;
                $acumRojas += $sumaTarjetasR;

                $indice += 1; // Incrementar el índice
                $promTAmarillas = $indice > 0 ? $acumAma / $indice : 0; // Calcular el promedio de tarjetas amarillas
                $promTRojas = $indice > 0 ? $acumRojas / $indice : 0; // Calcular el promedio de tarjetas rojas
                @endphp
                <tr>

                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">{{ \Carbon\Carbon::parse($partido->fixture_date)->format('Y-m-d') }}</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                        <img class="logoEquipo" src="https://media.api-sports.io/football/teams/{{$partido->teams_home_id}}.png">
                            <p class="ml-2 text-sm truncate {{ $partido->teams_home_name == $team ? 'color-verde' : '' }}">
                                {{ $partido->teams_home_name }}
                            </p>
                        </div>
                    </td>

                    <td>
                        <div class="flex items-center">    <img class="logoEquipo" src="https://media.api-sports.io/football/teams/{{$partido->teams_away_id}}.png">  <img class="logoEquipo" src="{{$partido->teams_away_logo}}">
                            <p class="ml-2 text-sm truncate {{ $partido->teams_away_name == $team ? 'color-verde' : '' }}">
                                {{ $partido->teams_away_name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="{{$partido->teams_away_logo}}">
                            <p class="ml-2 text-sm truncate">{{explode(',', $partido->fixture_referee)[0]}}</p>
                        </div>
                    </td>
                    <td>
                        <div>

                            <p>{{$partido->yellow_cards + $partido->yellow_cards2}}</p>
                        </div>
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 0.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 1.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 2.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 3.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 4.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 5.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->yellow_cards + $partido->yellow_cards2;

                        @endphp
                        @if($suma > 6.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                   

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    @if(isset($promTAmarillas))
                    <td>Suma (Promedio)</td>
                    <td colspan="3"></td>
                    <td>{{$acumAma}} ({{ number_format($promTAmarillas, 2) }})</td>
                    @else
                    <td colspan="3">Sin datos</td>
                    @endif
                </tr>
            </tfoot>
        </table>



    </div>
</div>
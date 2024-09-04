<div class="bg-gray-900">
    <div class="overflow-x-auto">
        @if($countMaches > 3)
           <livewire:calculadora-corners :nombreModelo="$auxModel" />
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
        </div>
    </div>

    <div class="overflow-x-auto table-container">
        <table id="customers">
            <thead >

                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th>Corners</th>
                    <th>+0,5</th>
                    <th>+1,5</th>
                    <th>+2,5</th>
                    <th>+3,5</th>
                    <th>+4,5</th>
                    <th>+5,5</th>
                    <th>+6,5</th>
                    <th>+7,5</th>
                    <th>+8,5</th>
                    <th>+9,5</th>
                    <th>+10,5</th>
                    <th>+11,5</th>
                    <th>+12,5</th>
                    <th>+13,5</th>
                    <th>+14,5</th>

                </tr>
            </thead>
            <tbody>
                @php
                $acum = 0;
                @endphp
                @foreach($partidos as $indice => $partido)
                @php
                $sumaCorners = $partido->corner_kicks + $partido->corner_kicks2;
                $acum += $sumaCorners;
                $indice = $indice+1;
                $prom = $acum/$indice;
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
                            <p class="ml-1 text-sm truncate">{{$partido->teams_home_name}}</p>
                        </div>
                    </td>

                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="https://media.api-sports.io/football/teams/{{$partido->teams_away_id}}.png">
                            <p class="ml-1 text-sm truncate">{{$partido->teams_away_name}}</p>
                        </div>
                    </td>
                    <td>
                        <div>

                            <p>{{$partido->corner_kicks + $partido->corner_kicks2}}</p>
                        </div>
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 0.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 1.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 2.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 3.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 4.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 5.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 6.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 7.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 8.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 9.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 10.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 11.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 12.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 13.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->corner_kicks + $partido->corner_kicks2;

                        @endphp
                        @if($suma > 14.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>


                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    @if(isset($prom))
                    <td class="ml-1 text-sm truncate">Suma (Promedio)</td>
                    <td colspan="2"></td>
                    <td class="ml-1 text-sm truncate">{{$acum}} ({{ number_format($prom, 2) }})</td>
                    @else
                    <td colspan="2">Sin datos</td>
                    @endif
                </tr>
            </tfoot>
        </table>



    </div>


</div>
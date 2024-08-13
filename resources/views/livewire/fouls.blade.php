<div class="bg-gray-900">
    <div class="overflow-x-auto">
      
        <div class="flex">
            <select class="seleccion selAnio" wire:model.live="temporada">
                @if(isset($temp2024))
                <option value="{{$temp2024}}">2024</option>
                @endif
                @if(isset($temp2023))
                <option value="{{$temp2023}}">2023</option>
                @endif
                @if(isset($temp2022))
                <option value="{{$temp2022}}">2022</option>
                @endif
                @if(isset($temp2021))
                <option value="{{$temp2021}}">2021</option>
                @endif
                @if(isset($temp2020))
                <option value="{{$temp2020}}">2020</option>
                @endif
            </select>
            <select class="seleccion" wire:model.live="team">
                <option value="todos">Team</option>
                <option value="todos">Todos...</option>
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
            <thead>
               
                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th>Fouls</th>
                    <th>+5,5</th>
                    <th>+7,5</th>
                    <th>+9,5</th>
                    <th>+11,5</th>
                    <th>+13,5</th>
                    <th>+15,5</th>
                    <th>+17,5</th>
                    <th>+19,5</th>
                    <th>+21,5</th>
                    <th>+23,5</th>
                    <th>+25,5</th>
                    <th>+27,5</th>
                    <th>+29,5</th>
                    <th>+31,5</th>
                    <th>+33,5</th>
                   

                </tr>
            </thead>
            <tbody>
                @php
                $acum = 0;
                @endphp
                @foreach($partidos as $indice => $partido)
                @php
                $sumaTiros = $partido->fouls + $partido->fouls2;
                $acum += $sumaTiros;
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

                            <p>{{$partido->fouls + $partido->fouls2}}</p>
                        </div>
                    </td>
                   
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 5.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 7.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 9.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 11.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 13.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 15.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 17.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 19.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 21.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 23.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>

                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 25.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 27.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 29.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 31.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->fouls + $partido->fouls2;

                        @endphp
                        @if($suma > 33.5)
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
                    <td>Suma (Promedio)</td>
                    <td colspan="2"></td>
                    <td>{{$acum}} ({{ number_format($prom, 2) }})</td>
                    @else
                    <td colspan="2">Sin datos</td>
                    @endif
                </tr>
            </tfoot>
        </table>



    </div>
</div>
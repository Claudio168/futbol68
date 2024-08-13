<div class="bg-gray-900">
    @include('livewire.layout-shot')

    <div class="overflow-x-auto table-container">
        <table id="customers">
            <thead>

                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th>Tiros_totales</th>
                    <th>+10,5</th>
                    <th>+11,5</th>
                    <th>+12,5</th>
                    <th>+13,5</th>
                    <th>+14,5</th>
                    <th>+15,5</th>
                    <th>+16,5</th>
                    <th>+17,5</th>
                    <th>+18,5</th>
                    <th>+19,5</th>
                    <th>+20,5</th>
                    <th>+21,5</th>
                    <th>+22,5</th>
                    <th>+23,5</th>
                    <th>+24,5</th>
                    <th>+25,5</th>
                    <th>+26,5</th>
                    <th>+27,5</th>
                    <th>+28,5</th>
                    <th>+29,5</th>
                    <th>+30,5</th>
                    <th>+31,5</th>
                    <th>+32,5</th>
                    <th>+33,5</th>
                    <th>+34,5</th>
                    <th>+35,5</th>
                    <th>+36,5</th>
                    <th>+37,5</th>
                    <th>+38,5</th>
                    <th>+39,5</th>

                </tr>
            </thead>
            <tbody>
                @php
                $acum = 0;
                @endphp
                @foreach($partidos as $indice => $partido)
                @php
                $sumaTiros = $partido->total_shots + $partido->total_shots2;
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

                            <p>{{$partido->total_shots + $partido->total_shots2}}</p>
                        </div>
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 10.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 11.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 12.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 13.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 14.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 15.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 16.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 17.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 18.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 19.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 20.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 21.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 22.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 23.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 24.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 25.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 26.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 27.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 28.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 29.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 30.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 31.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 32.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 33.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 34.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>

                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 35.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 36.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 37.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 38.5)
                        <img class="verde" src="/verde.svg">
                        @else

                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->total_shots + $partido->total_shots2;

                        @endphp
                        @if($suma > 39.5)
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
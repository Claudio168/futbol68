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
                <option value="">Team</option>
                <option value="">Todos...</option>
                @foreach($teams as $team)
                <option class="text-left">{{$team}}</option>
                @endforeach

            </select>
            <select class="seleccion selAnio" wire:model.live="lugar">
                <option value="ambos">Lugar</option>
                <option value="ambos">Ambos...</option>
                <option class="text-left" value="local">Local</option>
                <option class="text-left" value="visita">Visita</option>

            </select>
            <select class="seleccion" wire:model.live="total">
                <option value="totalPartido">Total partido</option>
                <option class="text-left" value="totalEquipo">Solo Equipo Seleccionado</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto table-container">

        <table id="customers">
            <thead class="">
                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th colspan="2">HalfTime</th>
                    <th>+0,5</th>
                    <th>+1,5</th>
                    <th>+2,5</th>
                    <th colspan="2">FullTime</th>
                    <th>+0,5</th>
                    <th>+1,5</th>
                    <th>+2,5</th>

                </tr>
            </thead>
            <tbody>
                @php $mas0ht=0; $mas1ht=0; $mas2ht=0; $mas0ft=0; $mas1ft=0; $mas2ft=0; $totalMaches=0; @endphp
                @foreach($partidos as $partido)
                @php $totalMaches++; @endphp

                <tr>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate"> {{$partido->fixture_date}}</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="{{ $partido->teams_home_logo }}">
                            <p class="ml-1 text-sm truncate">{{ $partido->teams_home_name }}</p>
                        </div>

                    </td>

                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="{{ $partido->teams_away_logo }}">
                            <p class="ml-1 text-sm truncate">{{ $partido->teams_away_name }}</p>
                        </div>
                    </td>
                    <td>
                        {{$partido->score_halftime_home}}
                    </td>
                    <td>
                        {{$partido->score_halftime_away}}
                    </td>
                    <td>

                        @php

                        $suma = $partido->score_halftime_home + $partido->score_halftime_away;

                        @endphp
                        @if($suma > 0.5)
                        @php $mas0ht++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @php
                        $suma = $partido->score_halftime_home + $partido->score_halftime_away;
                        @endphp
                        @if($suma > 1.5)
                        @php $mas1ht++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @php
                        $suma = $partido->score_halftime_home + $partido->score_halftime_away;
                        @endphp
                        @if($suma > 2.5)
                        @php $mas2ht++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        {{$partido->score_fulltime_home}}
                    </td>
                    <td>
                        {{$partido->score_fulltime_away}}
                    </td>
                    <td>
                        @php
                        $suma = $partido->score_fulltime_home + $partido->score_fulltime_away;
                        @endphp
                        @if($suma > 0.5)
                        @php $mas0ft++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @php
                        $suma = $partido->score_fulltime_home + $partido->score_fulltime_away;
                        @endphp
                        @if($suma > 1.5)
                        @php $mas1ft++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @php

                        $suma = $partido->score_fulltime_home + $partido->score_fulltime_away;

                        @endphp
                        @if($suma > 2.5)
                        @php $mas2ft++ @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>Total: {{$totalMaches}}</td>
                    <td colspan="4"></td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas0ht}} ({{number_format($mas0ht*100/$totalMaches, 1)}}%)
                                @else
                                {{$mas0ht}} (0%)
                                @endif
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas1ht}} ({{number_format($mas1ht*100/$totalMaches,1)}}%)
                                @else
                                {{$mas1ht}} (0%)
                                @endif
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas2ht}} ({{number_format($mas2ht*100/$totalMaches,1)}}%)
                                @else
                                {{$mas2ht}} (0%)
                                @endif
                            </p>
                        </div>
                    </td>
                    <td colspan="2"></td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas0ft}} ({{number_format($mas0ft*100/$totalMaches,1)}}%)
                                @else
                                {{$mas0ft}} (0%)
                                @endif
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas1ft}} ({{number_format($mas1ft*100/$totalMaches,1)}}%)
                                @else
                                {{$mas1ft}} (0%)
                                @endif
                            </p>

                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate">
                                @if ($totalMaches != 0)
                                {{$mas2ft}} ({{number_format($mas2ft*100/$totalMaches,1)}}%)
                                @else
                                {{$mas2ft}} (0%)
                                @endif
                            </p>

                        </div>
                    </td>

                </tr>
            </tfoot>
        </table>

    </div>

</div>
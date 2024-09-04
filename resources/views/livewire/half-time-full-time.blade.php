<div class="bg-gray-900">
    <div class="overflow-x-auto">
        <div class="flex">
            <select class="seleccion selAnio" wire:model.live="temporada">
            @foreach($anios  as $anio)
                <option value="{{ $anio }}"> {{ $anio }} </option>
                @endforeach
            </select>
            <select class="seleccion" wire:model.live="team">
                <option value="todos">Team</option>
                <option value="todos">Todos...</option>
                @foreach($teams as $team)
                <option class="text-left">{{ $team}}</option>
                @endforeach

            </select>
            <select class="seleccion selAnio" wire:model.live="lugar">
                <option value="ambos">Lugar</option>
                <option value="ambos">Ambos...</option>
                <option class="text-left" value="local">Local</option>
                <option class="text-left" value="visita">Visita</option>

            </select>
           
        </div>
    </div>

    <div class="overflow-x-auto table-container">

        <table id="customers">
            <thead class="">
                <tr class="">
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th colspan="2">HalfTime</th>
                    <th colspan="2">FullTime</th>
                    <th>Local/Local</th>
                    <th>Empate/Local</th>
                    <th>Visita/Local</th>
                    <th>Empate/Empate</th>
                    <th>Empate/Visita</th>
                    <th>Local/Visita</th>
                    <th>Visita/Visita</th>
                </tr>
            </thead>
            <tbody>
                @php
                $localLocalSuma=0; $empateLocalSuma=0; $visitaLocalSuma=0;$empateEmpateSuma=0; $empateVisitaSuma=0; $localVisitaSuma=0; $visitaVisitaSuma=0; $totalMaches=0;
                @endphp
                @foreach($partidos as $partido)
                @php $totalMaches++ @endphp
                <tr>
                    <td>
                        <div class="flex items-center">
                            <p class="ml-1 text-sm truncate"> {{$partido->fixture_date}}</p>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="{{ $partido->teams_home_logo }}">
                            <p class="ml-1 text-sm truncate">{{ $partido->teams_home_name}}</p>
                        </div>

                    </td>

                    <td>
                        <div class="flex items-center">
                            <img class="logoEquipo" src="{{ $partido->teams_away_logo }}">
                            <p class="ml-2 text-sm truncate">{{ $partido->teams_away_name}}</p>
                        </div>
                    </td>
                    <td>
                        {{$partido->score_halftime_home}}
                    </td>
                    <td>
                        {{$partido->score_halftime_away}}
                    </td>
                    <td>
                        {{$partido->score_fulltime_home}}
                    </td>
                    <td>
                        {{$partido->score_fulltime_away}}
                    </td>

                    <td>
                        @if(($partido->score_halftime_home > $partido->score_halftime_away) && ($partido->score_fulltime_home > $partido->score_fulltime_away))
                        @php $localLocalSuma++; @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home == $partido->score_halftime_away) && ($partido->score_fulltime_home > $partido->score_fulltime_away))
                        @php $empateLocalSuma++; @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home < $partido->score_halftime_away) && ($partido->score_fulltime_home > $partido->score_fulltime_away))
                            @php $visitaLocalSuma++; @endphp
                            <img class="verde" src="/verde.svg">
                            @else
                            <img class="rojo" src="/rojo.svg">
                            @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home == $partido->score_halftime_away) && ($partido->score_fulltime_home == $partido->score_fulltime_away))
                            @php $empateEmpateSuma++; @endphp
                            <img class="verde" src="/verde.svg">
                            @else
                            <img class="rojo" src="/rojo.svg">
                            @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home == $partido->score_halftime_away) && ($partido->score_fulltime_home < $partido->score_fulltime_away))
                            @php $empateVisitaSuma++; @endphp
                            <img class="verde" src="/verde.svg">
                            @else
                            <img class="rojo" src="/rojo.svg">
                            @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home > $partido->score_halftime_away) && ($partido->score_fulltime_home < $partido->score_fulltime_away))
                            @php $localVisitaSuma++; @endphp
                            <img class="verde" src="/verde.svg">
                            @else
                            <img class="rojo" src="/rojo.svg">
                            @endif
                    </td>
                    <td>
                        @if(($partido->score_halftime_home < $partido->score_halftime_away) && ($partido->score_fulltime_home < $partido->score_fulltime_away))
                            @php $visitaVisitaSuma++; @endphp
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
                    @if($totalMaches != 0)
                    <td>Tota: {{$totalMaches}}</td>
                    <td colspan="6"></td>
                    <td>{{$localLocalSuma }} ({{number_format($localLocalSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{$empateLocalSuma }} ({{number_format($empateLocalSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{$visitaLocalSuma }} ({{number_format($visitaLocalSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{ $empateEmpateSuma }} ({{number_format($empateEmpateSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{$empateVisitaSuma }} ({{number_format($empateVisitaSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{$localVisitaSuma }} ({{number_format($localVisitaSuma*100/$totalMaches,1)}}%)</td>
                    <td>{{$visitaVisitaSuma }} ({{number_format($visitaVisitaSuma*100/$totalMaches,1)}}%)</td>
                    @else
                    <td colspan="2">Sin datos</td>
                    @endif
                </tr>
            </tfoot>
        </table>

    </div>
</div>
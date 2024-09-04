<div class="bg-gray-800">
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
                <tr class="">
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Visita</th>
                    <th colspan="2">HalfTime</th>
                    <th>Ambos Marcan</th>
                  
                    <th colspan="2">FullTime</th>
                    <th>Ambos Marcan</th>

                </tr>
            </thead>
            <tbody>
            @php
                $ambosMarcanPrimerTiempo = 0; $ambosMarcanFinal  = 0; $countMaches=0;
            @endphp
                @foreach($partidos as $partido)
                @php $countMaches++;   @endphp
                <tr>
                    <td>
                        {{$partido->fixture_date}}
                    </td>
                    <td>
                        <div class="flex-container">
                            <img class="logoEquipo" src="{{$partido->teams_home_logo}}">
                            <p>{{$partido->teams_home_name}}</p>
                        </div>

                    </td>

                    <td>
                        <div class="flex-container">
                            <img class="logoEquipo" src="{{$partido->teams_away_logo}}">
                            <p>{{$partido->teams_away_name}}</p>
                        </div>
                    </td>
                    <td>
                        {{$partido->score_halftime_home}}
                    </td>
                    <td>
                        {{$partido->score_halftime_away}}
                    </td>
                    <td>
                       
                        @if($partido->score_halftime_home > 0.5 &&  $partido->score_halftime_away > 0.5)
                        @php $ambosMarcanPrimerTiempo++; @endphp
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
                       @if($partido->score_fulltime_home > 0.5 && $partido->score_fulltime_away > 0.5 )
                       @php $ambosMarcanFinal++; @endphp
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
                    @if($countMaches != 0)
                    <td>Total {{$countMaches}}</td>
                    <td colspan="4"></td>
                    <td>{{$ambosMarcanPrimerTiempo}} ({{number_format($ambosMarcanPrimerTiempo*100/$countMaches,1)}}%)</td>
                    <td colspan="2"></td>
                    <td>{{$ambosMarcanFinal}} ({{number_format($ambosMarcanFinal*100/$countMaches,1)}}%)</td>
                     @else
                     <td colspan="2">Sin datos</td>
                     @endif
                </tr>
            </tfoot>
        </table>
     
    </div>
</div>
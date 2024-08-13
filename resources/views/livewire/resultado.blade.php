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
                <option class="text-left">{{$team}}</option>
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
                    <th colspan="2">FullTime</th>
                    <th>Gana Local</th>
                    <th>Empate</th>
                    <th>Gana Visita</th>
                    
                </tr>
            </thead>
            <tbody>
                @php
                $ganaLocalSuma = 0; $empateSuma = 0; $ganaVisitaSuma=0; $localLocalSuma=0; $empateLocalSuma=0;
                $visitaLocalSuma=0;  $totalMaches=0;
                @endphp
                @foreach($partidos as $partido)
                @php $totalMaches++ @endphp
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
                        {{$partido->score_fulltime_home}}
                    </td>
                    <td>
                        {{$partido->score_fulltime_away}}
                    </td>
                    <td>
                        @if($partido->score_fulltime_home > $partido->score_fulltime_away)
                        @php $ganaLocalSuma++; @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @if($partido->score_fulltime_home == $partido->score_fulltime_away)
                        @php $empateSuma++; @endphp
                        <img class="verde" src="/verde.svg">
                        @else
                        <img class="rojo" src="/rojo.svg">
                        @endif
                    </td>
                    <td>
                        @if($partido->score_fulltime_home < $partido->score_fulltime_away)
                        @php $ganaVisitaSuma++; @endphp
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
                    <td>@if($totalMaches != 0) Total: {{$totalMaches}} @else Sin datos @endif</td>
                    <td colspan="4"></td>
                    <td>@if($totalMaches != 0){{$ganaLocalSuma}} ({{number_format($ganaLocalSuma*100/$totalMaches,1)}}%) @endif</td>
                    <td>@if($totalMaches != 0){{$empateSuma }} ({{number_format($empateSuma*100/$totalMaches,1)}}%) @endif</td>
                    <td>@if($totalMaches != 0){{$ganaVisitaSuma }} ({{number_format($ganaVisitaSuma*100/$totalMaches,1)}}%) @endif</td>
                  
                </tr>
            </tfoot>
        </table>

    </div>
</div>
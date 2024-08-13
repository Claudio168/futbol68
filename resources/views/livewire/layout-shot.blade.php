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
        <select class="seleccion" wire:model.live="param">
            <option value="shots_on_goal">Tiros a Puerta</option>
            <option value="shots_off_goal">Tiros Fuera de Puerta</option>
            <option value="blocked_shots">Tiros Bloqueados</option>
            <option value="shots_inside_box">Tiros Dentro del Área</option>
            <option value="shots_outside_box">Tiros Fuera del Área</option>
            <option value="total_shots">Total de Tiros</option>
        </select>
    </div>
</div>
<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Cache;


class Resultado extends Component
{


    public $lugar, $team, $temporada, $temp2024, $temp2023, $temp2022, $temp2021, $temp2020,  $pais, $liga, $temPorDefecto;


    public function render()
    {
        $modelName = $this->temporada ?? $this->temPorDefecto;
        //se guardan los partidos en cache durante una hora
        $cacheKeyPremier = $this->liga . $this->temporada;
        $model = Cache::remember($cacheKeyPremier, 1440, function () use ($modelName) {
            return app("App\\Models\\$this->pais\\$modelName");
        });

        //se guardan los equipos en cache durante un mes
        $cacheKey = 'teams' . $this->liga . $this->temporada;
        $teams = Cache::remember($cacheKey, 43200, function () use ($model) {
            $homeTeams = $model::select('teams_home_name')
                ->distinct()
                ->get()
                ->pluck('teams_home_name');

            $awayTeams = $model::select('teams_away_name')
                ->distinct()
                ->get()
                ->pluck('teams_away_name');

            $teams = $homeTeams->merge($awayTeams)->unique()->values()->toArray();

            return $teams;
        });

        $query =  $model::orderBy('fixture_timestamp', 'DESC')->get();

        if ($this->team) {

            if ($this->team == "todos") {
                $this->lugar = "ambos";
                $query = $model::orderBy('fixture_timestamp', 'DESC')->get();
            } else {
                $query = $model::where('teams_home_name', $this->team)->orWhere('teams_away_name', $this->team)->orderBy('fixture_timestamp', 'DESC')->get();
            }


            if ($this->lugar) {
                if ($this->lugar == "local") {
                    $query = $model::where('teams_home_name', $this->team)
                        ->orderBy('fixture_timestamp', 'DESC')->get();
                } elseif ($this->lugar == "visita") {
                    $query = $model::where('teams_away_name', $this->team)
                        ->orderBy('fixture_timestamp', 'DESC')->get();
                }
            }
        }

        $partidos = $query;
        return view('livewire.resultado', compact('partidos', 'teams'));
    }
}

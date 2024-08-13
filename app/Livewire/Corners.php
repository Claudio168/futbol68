<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;


class Corners extends Component
{
    public $lugar, $team, $total, $temporada, $temp2024, $temp2023,  $pais, $liga, $temPorDefecto, $countMaches;

    public function render()
    {
        $modelName = $this->temporada ?? $this->temPorDefecto;
        //se guardan los partidos en cache durante una hora
        $cacheKeyPremier = 'PremierLeagueStat' . $this->liga . $this->temporada;
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
        $this->countMaches = $query->count();

        if ($this->team) {

            $query = $model::where('teams_home_name', $this->team)->orWhere('teams_away_name', $this->team)->orderBy('fixture_timestamp', 'DESC')->get();
    

            if ($this->lugar) {
                if ($this->lugar == "local") {
                    $query = $model::where('teams_home_name', $this->team)
                        ->orderBy('fixture_timestamp', 'DESC')->get();
                } elseif ($this->lugar == "visita") {
                    $query = $model::where('teams_away_name', $this->team)
                        ->orderBy('fixture_timestamp', 'DESC')->get();
                }
            }

            if ($this->total) {

                if ($this->total == "totalEquipo") {
                    if ($this->lugar == "local") {
                        $query = $model::where('teams_home_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'teams_home_name', 'teams_away_name',  'corner_kicks')
                            ->get();
                    } elseif ($this->lugar == "visita") {
                        $query = $model::where('teams_away_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'teams_home_name', 'teams_away_name', 'corner_kicks2')
                            ->get();
                    } else {

                        $query = $query->map(function ($partido) {

                            if ($partido->teams_home_name == $this->team) {
                                return (object) [
                                    'teams_home_id' => $partido->teams_home_id,
                                    'teams_away_id' => $partido->teams_away_id,
                                    'fixture_date' => $partido->fixture_date,
                                    "fixture_referee" => $partido->fixture_referee,
                                    'teams_home_name' => $partido->teams_home_name,
                                    'teams_away_name' => $partido->teams_away_name,
                                    'teams_home_logo' => $partido->teams_home_logo,
                                    'teams_away_logo' => $partido->teams_away_logo,
                                    'corner_kicks' => $partido->corner_kicks,
                                    'corner_kicks2' => 0,

                                ];
                            } elseif ($partido->teams_away_name == $this->team) {
                                return (object) [
                                    'teams_home_id' => $partido->teams_home_id,
                                    'teams_away_id' => $partido->teams_away_id,
                                    'fixture_date' => $partido->fixture_date,
                                    "fixture_referee" => $partido->fixture_referee,
                                    'teams_home_name' => $partido->teams_home_name,
                                    'teams_away_name' => $partido->teams_away_name,
                                    'teams_home_logo' => $partido->teams_home_logo,
                                    'teams_away_logo' => $partido->teams_away_logo,
                                    'corner_kicks' => 0,
                                    'corner_kicks2' => $partido->corner_kicks2,
                                ];
                            }
                        });
                    }
                }
                if ($this->total == "totalPartido") {

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
            }
        }

        $partidos = $query;

        return view('livewire.corners', compact('partidos', 'teams'));
    }
}

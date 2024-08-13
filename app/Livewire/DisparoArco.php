<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;


class DisparoArco extends Component
{
    public $lugar, $team, $total, $temporada, $temp2024, $temp2023,  $pais, $liga, $temPorDefecto, $countMaches, $param;

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
            if ($this->team == "todos") {
                $this->lugar = "ambos";
                $this->total = "totalPartido";
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

            if ($this->total) {

                if ($this->total == "totalEquipo") {
                    if ($this->lugar == "local") {
                        $query = $model::where('teams_home_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'teams_home_name', 'teams_away_name',  'shots_on_goal', 'shots_off_goal', 'total_shots', 'blocked_shots', 'shots_inside_box', 'shots_outside_box')
                            ->get();
                    } elseif ($this->lugar == "visita") {
                        $query = $model::where('teams_away_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'teams_home_name', 'teams_away_name', 'shots_on_goal2', 'shots_off_goal2', 'total_shots2', 'blocked_shots2', 'shots_inside_box2', 'shots_outside_box2')
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
                                    'shots_on_goal' => $partido->shots_on_goal,
                                    'shots_on_goal2' => 0,
                                    'shots_off_goal' => $partido->shots_off_goal,
                                    'shots_off_goal2' => 0,
                                    'total_shots' => $partido->total_shots,
                                    'total_shots2' => 0,
                                    'blocked_shots' => $partido->blocked_shots,
                                    'blocked_shots2' => 0,
                                    'shots_inside_box' => $partido->shots_inside_box,
                                    'shots_inside_box2' => 0,
                                    'shots_outside_box' => $partido->shots_outside_box,
                                    'shots_outside_box2' => 0,

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
                                    'shots_on_goal' => 0,
                                    'shots_on_goal2' => $partido->shots_on_goal2,
                                    'shots_off_goal' => 0,
                                    'shots_off_goal2' => $partido->shots_off_goal2,
                                    'total_shots' => 0,
                                    'total_shots2' => $partido->total_shots2,
                                    'blocked_shots' => 0,
                                    'blocked_shots2' => $partido->blocked_shots2,
                                    'shots_inside_box' => 0,
                                    'shots_inside_box2' => $partido->shots_inside_box2,
                                    'shots_outside_box' => 0,
                                    'shots_outside_box2' =>  $partido->shots_outside_box2,

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

        // Determinar qué vista renderizar según la opción seleccionada
        if ($this->param === 'shots_on_goal') {
            return view('livewire.disparo-arco', compact('partidos', 'teams'));
        } elseif ($this->param === 'shots_off_goal') {
            return view('livewire.shots_off_goal', compact('partidos', 'teams'));
        } elseif ($this->param === 'total_shots') {
            return view('livewire.total_shots', compact('partidos', 'teams'));
        } elseif ($this->param === 'blocked_shots') {
            return view('livewire.blocked_shots', compact('partidos', 'teams'));
        } elseif ($this->param === 'shots_inside_box') {
            return view('livewire.shots_inside_box', compact('partidos', 'teams'));
        } elseif ($this->param === 'shots_outside_box') {
            return view('livewire.shots_outside_box', compact('partidos', 'teams'));
        } else {
            return view('livewire.disparo-arco', compact('partidos', 'teams'));
        }

        //return view('livewire.disparo-arco', compact('partidos', 'teams'));
        //sleep(1);
    }
}

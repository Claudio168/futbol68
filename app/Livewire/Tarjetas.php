<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\YearRangeService;


class Tarjetas extends Component
{
    public $lugar, $team, $total, $arbitro, $temporada,  $pais, $liga, $countMaches, $param, $nombreModelo, $anioDefecto, $auxModel;

    
    public $anios = [];


    protected $yearRangeService;

    // Inyecta el servicio en el método mount
    public function mount(YearRangeService $yearRangeService)
    {
        $this->yearRangeService = $yearRangeService;
        $this->anios = $this->yearRangeService->getYearRange($this->pais);
        $this->temporada = session('temporada', reset($this->anios)); // Cargar desde la sesión o usar el valor por defecto
    }

    public function updatedTemporada($value)
    {
        session(['temporada' => $value]); // Actualizar la sesión
    }
    
    
    public function render()
    {
        $anioDefecto =  reset($this->anios);//se optiene el ultimo año del select
        $modelName = $this->nombreModelo . ($this->temporada ?? $anioDefecto);

        
        $this->auxModel = $modelName;
        
        // Se guarda el cacheKey basado en el modelo y temporada
        $cacheKeyPremier = $modelName;
        
        if ($this->temporada === $this->anioDefecto) {
            // Temporada actual, cacheo por 1 día (1440 minutos)
            $model = Cache::remember($cacheKeyPremier, 1440, function () use ($modelName) {
                return app("App\\Models\\$this->pais\\$modelName");
            });
        } else {
            // Temporada anterior, cacheo indefinido
            $model = Cache::rememberForever($cacheKeyPremier, function () use ($modelName) {
                return app("App\\Models\\$this->pais\\$modelName");
            });
        }


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

        $arbitros = $model::orderBy('fixture_referee', 'ASC')
            ->select('fixture_referee')
            ->distinct()
            ->get();



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
                } elseif ($this->lugar == "ambos") {
                    //$this->total = "totalPartido";
                    $query = $model::where('teams_home_name', $this->team)->orWhere('teams_away_name', $this->team)->orderBy('fixture_timestamp', 'DESC')->get();
                }
            }

            if ($this->total) {

                if ($this->total == "totalEquipo") {
                    if ($this->lugar == "local") {
                        $query = $model::where('teams_home_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'fixture_referee', 'teams_home_name', 'teams_away_name',  'yellow_cards', 'red_cards')
                            ->get();
                    } elseif ($this->lugar == "visita") {
                        $query = $model::where('teams_away_name', $this->team)
                            ->orderBy('fixture_timestamp', 'DESC')
                            ->select('id', 'teams_home_id', 'teams_away_id', 'fixture_referee', 'teams_home_name', 'teams_away_name', 'yellow_cards2', 'red_cards2')
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
                                    "yellow_cards" =>  $partido->yellow_cards,
                                    "red_cards" =>  $partido->red_cards,
                                    "yellow_cards2" => 0,
                                    "red_cards2" => 0,

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
                                    "yellow_cards" => 0,
                                    "red_cards" => 0,
                                    "yellow_cards2" =>  $partido->yellow_cards2,
                                    "red_cards2" =>  $partido->red_cards2,
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

        if ($this->param === "tarjetas-arbitro") {
            $query =  $model::orderBy('fixture_timestamp', 'DESC')->get();
        }
        if ($this->arbitro) {

            $query = $model::where('fixture_referee', $this->arbitro)
                ->orderBy('fixture_timestamp', 'DESC')->get();
            
            //$this->arbitro = false;
        }

        $partidos = $query;

        // Determinar qué vista renderizar según la opción seleccionada
        if ($this->param === 'tarjeta-amarillas') {
            return view('livewire.tarjetas-amarillas', compact('partidos', 'teams', 'arbitros'));
        } elseif ($this->param === 'tarjetas-rojas') {
            return view('livewire.tarjetas-rojas', compact('partidos', 'teams', 'arbitros'));
        } elseif ($this->param === 'tarjetas-arbitro') {
            return view('livewire.tarjetas-arbitro', compact('partidos', 'teams', 'arbitros'));
        } else {
            return view('livewire.tarjetas-amarillas', compact('partidos', 'teams', 'arbitros'));
        }
    }

    
   
}

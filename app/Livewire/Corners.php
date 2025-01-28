<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\YearRangeService;


class Corners extends Component
{
    public $lugar, $team, $total, $temporada,  $nombreModelo, $pais, $liga, $countMaches, $modelName, $anioDefecto, $auxModel;

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

        $this->anioDefecto = reset($this->anios); // Se obtiene el último año del select
        $modelName = $this->nombreModelo . ($this->temporada ?? $this->anioDefecto);

        $this->auxModel = $modelName;

        // Se guarda el cacheKey basado en el modelo y temporada
        $cacheKeyPremier = $modelName;

        if ($this->temporada === $this->anioDefecto) {
            // Temporada actual, cacheo por 1 día (1440 minutos)
            $model = Cache::remember($cacheKeyPremier, 1440, function () use ($modelName) {
                try {
                    // Intenta resolver el modelo
                    return app("App\\Models\\$this->pais\\$modelName");
                } catch (\Exception $e) {
                    // Retorna null o un valor predeterminado si no se encuentra el modelo
                    return null;
                }
            });
        } else {

            // Temporada anterior, cacheo indefinido
            $model = Cache::rememberForever($cacheKeyPremier, function () use ($modelName) {
                try {
                    // Intenta resolver el modelo
                    return app("App\\Models\\$this->pais\\$modelName");
                } catch (\Exception $e) {
                    // Retorna null o un valor predeterminado si no se encuentra el modelo
                    return null;
                }
            });
        }
        // Verifica si el modelo es válido antes de continuar
        if ($model) {
            //Equipos en cache
        $cacheKey = 'teams' . $modelName;
        // Si es la temporada actual, cachea por un mes (43200 minutos). Para temporadas anteriores, cachea indefinidamente.
        if ($this->temporada === $this->anioDefecto) {
            // Temporada actual: Cacheo por 1 mes (43200 minutos)
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
        } else {
            // Temporadas anteriores: Cacheo indefinido
            $teams = Cache::rememberForever($cacheKey, function () use ($model) {
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
        }


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
        } else {
            // Lógica cuando no se encuentra un modelo válido
            // Ejemplo: Mostrar un mensaje de error o redirigir
            return view('errors.modelo_no_encontrado');
        }
        
    }
}

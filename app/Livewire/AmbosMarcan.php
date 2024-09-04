<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Services\YearRangeService;


class AmbosMarcan extends Component
{
    

    public $lugar, $team, $total, $temporada, $nombreModelo, $pais, $liga;

    public $anios = [];


    protected $yearRangeService;

    // Inyecta el servicio en el método mount
    public function mount(YearRangeService $yearRangeService)
    {
        $this->yearRangeService = $yearRangeService;
        $this->anios = $this->yearRangeService->getYearRange($this->pais);
    }
    
    public function render()
    {
        $anioDefecto =  reset($this->anios);//se optiene el ultimo año del select
        $modelName = $this->nombreModelo . ($this->temporada ?? $anioDefecto);
          //se guardan los partidos en cache durante una hora
        $cacheKeyPremier = $this->liga . $this->temporada;
        $model = Cache::remember($cacheKeyPremier, 1440, function () use ($modelName) {
            return app("App\\Models\\$this->pais\\$modelName");
        });
       
       //se guardan los equipos en cache durante un mes
        $cacheKey = 'teams'.$this->liga . $this->temporada;
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
       

        if($this->team){
           
            if($this->team == "todos"){
                $this->lugar = "ambos";
                $query = $model::orderBy('fixture_timestamp', 'DESC')->get();
            }else{
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
        return view('livewire.ambos-marcan', compact('partidos', 'teams'));
    }
}


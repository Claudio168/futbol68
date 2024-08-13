<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class CalculadoraCorners extends Component
{
    public $local, $visita, $corners,  $temporada, $liga, $cornersEsperados, $pais, $temPorDefecto,$idLocal, $idVisita;

    public function render()
    {
        $modelName = $this->temporada ?? $this->temPorDefecto;
        $model = app("App\\Models\\$this->pais\\$modelName");

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

        //$query =  $model::orderBy('fixture_date', 'DESC')->get();

        $partidosLocal = $model::where('teams_home_name', $this->local)
            ->select('teams_home_id','corner_kicks', 'corner_kicks2')
            ->get();
        $acumLocalFavor = 0;
        $acumLocalContra = 0;
        $indice = 0;
        
        foreach ($partidosLocal as $partido) {
            $acumLocalFavor += $partido->corner_kicks;
            $acumLocalContra += $partido->corner_kicks2;
            $indice++;
            $this->idLocal = $partido->teams_home_id;
        }
        
        $partidosVisita = $model::where('teams_away_name', $this->visita)
            ->select('teams_away_id','corner_kicks', 'corner_kicks2')
            ->get();
        $acumVisitaFavor = 0;
        $acumVisitaContra = 0;
        $indice2 = 0;
        foreach ($partidosVisita as $partido) {
            $acumVisitaFavor += $partido->corner_kicks2;
            $acumVisitaContra += $partido->corner_kicks;
            $indice2++;
            $this->idVisita = $partido->teams_away_id;
        }
    
        //$this->idLocal = $partidosLocal['teams_home_id'];
        if ($this->local == "todos" || $this->visita == "todos") {
            $this->cornersEsperados = "";
        } else {

            if ($this->local && $this->visita && $this->local !== "todos" && $this->visita !== "todos") {
                
                

                $promLocalFavor =  $acumLocalFavor / $indice;
                $promLocalContra =  $acumLocalContra / $indice;
                $promVisitaFavor =  $acumVisitaFavor / $indice2;
                $promVisitaContra =  $acumVisitaContra / $indice2;

                $corners1 = $promLocalFavor + $promVisitaContra;
                $corners2 = $promVisitaFavor + $promLocalContra;
                $sumaCornes = $corners1 + $corners2 + 10;

               
                
               $cornersesperados = ($sumaCornes / 3);
               
               $cornersesperados  = round($cornersesperados); // Redondea sin decimales
               $cornersesperados   = intval( $cornersesperados ); // Convierte a entero

               $this->cornersEsperados =  $cornersesperados;
            }
        }






        return view('livewire.calculadora-corners', compact('teams'));
    }
}



  

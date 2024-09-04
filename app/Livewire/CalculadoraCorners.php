<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class CalculadoraCorners extends Component
{
    public $local, $visita, $corners, $temporada, $liga, $cornersEsperados, $pais, $nombreModelo, $idLocal, $idVisita;

    
    public function render()
    {
        // Recuperar el modelo desde el cache
        $model = Cache::get($this->nombreModelo);
        // Obtener los equipos locales y visitantes
        $homeTeams = $model::select('teams_home_name')
            ->distinct()
            ->get()
            ->pluck('teams_home_name');

        $awayTeams = $model::select('teams_away_name')
            ->distinct()
            ->get()
            ->pluck('teams_away_name');

        $teams = $homeTeams->merge($awayTeams)->unique()->values()->toArray();

        // Calcular las estadísticas de corners
        $partidosLocal = $model::where('teams_home_name', $this->local)
            ->select('teams_home_id', 'corner_kicks', 'corner_kicks2')
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
            ->select('teams_away_id', 'corner_kicks', 'corner_kicks2')
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
                $cornersesperados   = intval($cornersesperados); // Convierte a entero

                $this->cornersEsperados =  $cornersesperados;
            }
        }

        // Devolver la vista con los datos necesarios
        return view('livewire.calculadora-corners', compact('teams'));
    }
}

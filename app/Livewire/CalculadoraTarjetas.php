<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class CalculadoraTarjetas extends Component
{
    public $local, $visita,  $tarjetasEsperadas, $pais, $arbitro, $temporada, $nombreModelo, $liga, $idLocal, $idVisita;

    public function render()
    {
        // Recuperar el modelo desde el cache
        $model = Cache::get($this->nombreModelo);

        //se guardan los equipos en cache durante un mes
        $cacheKey = 'teams'.$this->liga . $this->temporada;
        $teams = Cache::remember($cacheKey, 0, function () use ($model) {
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

        //consulta de tarjetas para el arbitro
        $consulta = $model
            ->select($model::raw('SUM(yellow_cards + yellow_cards2) as total_yellow_cards, COUNT(*) as total_registros, AVG(yellow_cards + yellow_cards2) as promedio_yellow_cards'))
            ->where('fixture_referee', $this->arbitro)
            ->first();

        $totalYellowCards = $consulta->total_yellow_cards;
        $totalRegistros = $consulta->total_registros;
        $promedioYellowCardsArbitro = $consulta->promedio_yellow_cards;
    

        $partidosLocal = $model::where('teams_home_name', $this->local)
            ->select('teams_home_id','yellow_cards', 'yellow_cards2')
            ->latest() // Ordenar por fecha descendente
            ->limit(5) // Limitar a 5 resultados
            ->get();

        $acumLocalFavor = 0;
        $acumLocalContra = 0;
        $indice = 0;



        foreach ($partidosLocal as $partido) {
            $acumLocalFavor += $partido->yellow_cards;
            $acumLocalContra += $partido->yellow_cards;
            $indice++;
            $this->idLocal = $partido->teams_home_id;
        }


        $partidosVisita = $model::where('teams_away_name', $this->visita)
            ->select('teams_away_id','yellow_cards', 'yellow_cards2')
            ->latest() // Ordenar por fecha descendente
            ->limit(5) // Limitar a 5 resultados
            ->get();
        
        $acumVisitaFavor = 0;
        $acumVisitaContra = 0;
        $indice2 = 0;
        foreach ($partidosVisita as $partido) {
            $acumVisitaFavor += $partido->yellow_cards2;
            $acumVisitaContra += $partido->yellow_cards2;
            $indice2++;
            $this->idVisita = $partido->teams_away_id;

        }

        if ($this->local == "todos" || $this->visita == "todos" || $this->arbitro == "todos") {
            $this->tarjetasEsperadas = "";
        } else {

            if ($this->local && $this->visita && $this->arbitro && $this->local !== "todos" && $this->visita !== "todos" && $this->arbitro !== "todos") {



                $promLocalFavor =  $acumLocalFavor / $indice;
                $promLocalContra =  $acumLocalContra / $indice;
                $promVisitaFavor =  $acumVisitaFavor / $indice2;
                $promVisitaContra =  $acumVisitaContra / $indice2;

                $tarjetas1 = $promLocalFavor + $promVisitaContra;
                $tarjetas2 = $promVisitaFavor + $promLocalContra;

                if ($this->arbitro == "otro" ||  $totalRegistros < 5) {
                    $promedioYellowCardsArbitro = 4.5;
                }


                

                $sumatarjetas = $tarjetas1 + $tarjetas2 + $promedioYellowCardsArbitro;



                $tarjetasEsperadas = ($sumatarjetas / 3);

                $tarjetasEsperadas  = round($tarjetasEsperadas); // Redondea sin decimales
                $tarjetasEsperadas  = intval($tarjetasEsperadas); // Convierte a entero

                $this->tarjetasEsperadas = $tarjetasEsperadas;
            }
        }


        return view('livewire.calculadora-tarjetas', compact('teams', 'arbitros'));
    }
}

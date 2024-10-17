<?php

namespace App\Services;

class YearRangeService
{
    public function getYearRange(string $pais): array
    {
        $paisesDeEuropa = ['Espania', 'Francia', 'Alemania', 'Italia', 'Portugal', 'Inglaterra', 'PaisesBajos', 'Mexico'];

        if (in_array($pais, $paisesDeEuropa)) {
            $anios = range(2020, 2024); // Rango de años
        } else {
            $anios = range(2020, 2024); // Rango de años
        }

        rsort($anios); // Ordena la lista de años de mayor a menor

        return $anios;
    }
}
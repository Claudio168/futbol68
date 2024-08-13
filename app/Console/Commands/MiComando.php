<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MiComando extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:MiComando';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('get', '/subirpremierleaguefixtures');
        $this->esperar(60); // Espera un minuto (60 segundos)
        
        Artisan::call('get', '/subirLaligafixtures');
        $this->esperar(60); // Espera un minuto (60 segundos)

        Artisan::call('get', '/subirElCalcioFixtures');
        $this->esperar(60); // Espera un minuto (60 segundos)

        Artisan::call('get', '/subirLaBundesligaFixtures');
        $this->esperar(60); // Espera un minuto (60 segundos)
        
        // Continuar con las llamadas a las demás rutas...
    }
   

    protected function esperar($segundos)
    {
        sleep($segundos);
    }
}

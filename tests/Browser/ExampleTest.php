<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000')
            ->clickLink('Enlace 1') // Cambia esto según tu estructura de enlaces
            ->pause(2000); // Pausa para que puedas ver lo que está sucediendo (opcional)
        });
    }
}

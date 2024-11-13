<?php


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inglaterra.premier.index');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //Inglaterra
    Route::get('/dashboard', function () {
        return view('inglaterra.premier.index');
    })->name('dashboard');

    Route::get('/premier-league-corners', function () {
        return view('inglaterra.premier.corners');
    })->name('premier-league-corners');

    Route::get('/premier-league-ambos-marcan', function () {
        return view('inglaterra.premier.ambos_marcan');
    })->name('premier-league-ambos-marcan');

    Route::get('/premier-league-resultado', function () {
        return view('inglaterra.premier.resultado');
    })->name('premier-league-resultado');

    Route::get('/premier-league-ht-ft', function () {
        return view('inglaterra.premier.ht-ft');
    })->name('premier-league-ht-ft');

    Route::get('/premier-league-tarjetas', function () {
        return view('inglaterra.premier.tarjetas');
    })->name('premier-league-tarjetas');

    Route::get('/premier-league-disparo-arco', function () {
        return view('inglaterra.premier.disparo-arco');
    })->name('premier-league-disparo-arco');

    Route::get('/premier-league-fouls', function () {
        return view('inglaterra.premier.fouls');
    })->name('premier-league-fouls');

    //España
    Route::get('/la-liga-corners', function () {
        return view('espania.corners');
    })->name('la-liga-corners');
    Route::get('/la-liga-ht-ft', function () {
        return view('espania.ht-ft');
    })->name('la-liga-ht-ft');
    Route::get('/la-liga-resultado', function () {
        return view('espania.resultado');
    })->name('la-liga-resultado');
    Route::get('/la-liga-ambos-marcan', function () {
        return view('espania.ambos_marcan');
    })->name('la-liga-ambos-marcan');
    Route::get('/la-liga-tarjetas', function () {
        return view('espania.tarjetas');
    })->name('la-liga-tarjetas');
    Route::get('/la-liga-disparo-arco', function () {
        return view('espania.disparo-arco');
    })->name('la-liga-disparo-arco');
    Route::get('/la-liga-fouls', function () {
        return view('espania.fouls');
    })->name('la-liga-fouls');

    //Italia
    Route::get('/el-calcio-corners', function () {
        return view('italia.corners');
    })->name('el-calcio-corners');
    Route::get('/el-calcio-ht-ft', function () {
        return view('italia.ht-ft');
    })->name('el-calcio-ht-ft');
    Route::get('/el-calcio-resultado', function () {
        return view('italia.resultado');
    })->name('el-calcio-resultado');
    Route::get('/el-calcio-ambos-marcan', function () {
        return view('italia.ambos_marcan');
    })->name('el-calcio-ambos-marcan');
    Route::get('/el-calcio-tarjetas', function () {
        return view('italia.tarjetas');
    })->name('el-calcio-tarjetas');
    Route::get('/el-calcio-disparo-arco', function () {
        return view('italia.disparo-arco');
    })->name('el-calcio-disparo-arco');
    Route::get('/el-calcio-fouls', function () {
        return view('italia.fouls');
    })->name('el-calcio-fouls');

    //Alemania
    Route::get('/bundesliga-corners', function () {
        return view('alemania.corners');
    })->name('bundesliga-corners');
    Route::get('/bundesliga-ht-ft', function () {
        return view('alemania.ht-ft');
    })->name('bundesliga-ht-ft');
    Route::get('/bundesliga-resultado', function () {
        return view('alemania.resultado');
    })->name('bundesliga-resultado');
    Route::get('/bundesliga-ambos-marcan', function () {
        return view('alemania.ambos_marcan');
    })->name('bundesliga-ambos-marcan');
    Route::get('/bundesliga-tarjetas', function () {
        return view('alemania.tarjetas');
    })->name('bundesliga-tarjetas');
    Route::get('/bundesliga-disparo-arco', function () {
        return view('alemania.disparo-arco');
    })->name('bundesliga-disparo-arco');
    Route::get('/bundesliga-fouls', function () {
        return view('alemania.fouls');
    })->name('bundesliga-fouls');

    //Argentina
    //Copa de la liga
    Route::get('/copa-de-la-liga-argentina-corners', function () {
        return view('argentina.corners');
    })->name('copa-de-la-liga-argentina-corners');
    Route::get('/copa-de-la-liga-argentina-ht-ft', function () {
        return view('argentina.ht-ft');
    })->name('copa-de-la-liga-argentina-ht-ft');
    Route::get('/copa-de-la-liga-argentina-resultado', function () {
        return view('argentina.resultado');
    })->name('copa-de-la-liga-argentina-resultado');
    Route::get('/copa-de-la-liga-argentina-ambos-marcan', function () {
        return view('argentina.ambos_marcan');
    })->name('copa-de-la-liga-argentina-ambos-marcan');
    Route::get('/copa-de-la-liga-argentina-tarjetas', function () {
        return view('argentina.tarjetas');
    })->name('copa-de-la-liga-argentina-tarjetas');
    Route::get('/copa-de-la-liga-argentina-disparo-arco', function () {
        return view('argentina.disparo-arco');
    })->name('copa-de-la-liga-argentina-disparo-arco');
    Route::get('/copa-de-la-liga-argentina-fouls', function () {
        return view('argentina.fouls');
    })->name('copa-de-la-liga-argentina-fouls');

    //Super liga  agregar rutas y editar las vistas y las rutas navigation2
    Route::get('/super-liga-argentina-corners', function () {
        return view('argentina.superliga.corners');
    })->name('super-liga-argentina-corners');
    Route::get('/super-liga-argentina-ht-ft', function () {
        return view('argentina.superliga.ht-ft');
    })->name('super-liga-argentina-ht-ft');
    Route::get('/super-liga-argentina-resultado', function () {
        return view('argentina.superliga.resultado');
    })->name('super-liga-argentina-resultado');
    Route::get('/super-liga-argentina-ambos-marcan', function () {
        return view('argentina.superliga.ambos_marcan');
    })->name('super-liga-argentina-ambos-marcan');
    Route::get('/super-liga-argentina-tarjetas', function () {
        return view('argentina.superliga.tarjetas');
    })->name('super-liga-argentina-tarjetas');
    Route::get('/super-liga-argentina-disparo-arco', function () {
        return view('argentina.superliga.disparo-arco');
    })->name('super-liga-argentina-disparo-arco');
    Route::get('/super-liga-argentina-fouls', function () {
        return view('argentina.superliga.fouls');
    })->name('super-liga-argentina-fouls');

    //Francia
    Route::get('/ligue1-corners', function () {
        return view('francia.corners');
    })->name('ligue1-corners');
    Route::get('/ligue1-ht-ft', function () {
        return view('francia.ht-ft');
    })->name('ligue1-ht-ft');
    Route::get('/ligue1-resultado', function () {
        return view('francia.resultado');
    })->name('ligue1-resultado');
    Route::get('/ligue1-ambos-marcan', function () {
        return view('francia.ambos_marcan');
    })->name('ligue1-ambos-marcan');
    Route::get('/ligue1-tarjetas', function () {
        return view('francia.tarjetas');
    })->name('ligue1-tarjetas');
    Route::get('/ligue1-disparo-arco', function () {
        return view('francia.disparo-arco');
    })->name('ligue1-disparo-arco');
    Route::get('/ligue1-fouls', function () {
        return view('francia.fouls');
    })->name('ligue1-fouls');

    //Portugal
    Route::get('/primeiraliga-corners', function () {
        return view('portugal.corners');
    })->name('primeiraliga-corners');
    Route::get('/primeiraliga-ht-ft', function () {
        return view('portugal.ht-ft');
    })->name('primeiraliga-ht-ft');
    Route::get('/primeiraliga-resultado', function () {
        return view('portugal.resultado');
    })->name('primeiraliga-resultado');
    Route::get('/primeiraliga-ambos-marcan', function () {
        return view('portugal.ambos_marcan');
    })->name('primeiraliga-ambos-marcan');
    Route::get('/primeiraliga-tarjetas', function () {
        return view('portugal.tarjetas');
    })->name('primeiraliga-tarjetas');
    Route::get('/primeiraliga-disparo-arco', function () {
        return view('portugal.disparo-arco');
    })->name('primeiraliga-disparo-arco');
    Route::get('/primeiraliga-fouls', function () {
        return view('portugal.fouls');
    })->name('primeiraliga-fouls');

    //Chile
    Route::get('/chile-primera-division-corners', function () {
        return view('chile.corners');
    })->name('chile-primera-division-corners');
    Route::get('/chile-primera-division-ht-ft', function () {
        return view('chile.ht-ft');
    })->name('chile-primera-division-ht-ft');
    Route::get('/chile-primera-division-resultado', function () {
        return view('chile.resultado');
    })->name('chile-primera-division-resultado');
    Route::get('/chile-primera-division-ambos-marcan', function () {
        return view('chile.ambos_marcan');
    })->name('chile-primera-division-ambos-marcan');
    Route::get('/chile-primera-division-tarjetas', function () {
        return view('chile.tarjetas');
    })->name('chile-primera-division-tarjetas');
    Route::get('/chile-primera-division-disparo-arco', function () {
        return view('chile.disparo-arco');
    })->name('chile-primera-division-disparo-arco');
    Route::get('/chile-primera-division-fouls', function () {
        return view('chile.fouls');
    })->name('chile-primera-division-fouls');

    //Paises bajos
    Route::get('/eredivisie-corners', function () {
        return view('paisesbajos.corners');
    })->name('eredivisie-corners');
    Route::get('/eredivisie-ht-ft', function () {
        return view('paisesbajos.ht-ft');
    })->name('eredivisie-ht-ft');
    Route::get('/eredivisie-resultado', function () {
        return view('paisesbajos.resultado');
    })->name('eredivisie-resultado');
    Route::get('/eredivisie-ambos-marcan', function () {
        return view('paisesbajos.ambos_marcan');
    })->name('eredivisie-ambos-marcan');
    Route::get('/eredivisie-tarjetas', function () {
        return view('paisesbajos.tarjetas');
    })->name('eredivisie-tarjetas');
    Route::get('/eredivisie-disparo-arco', function () {
        return view('paisesbajos.disparo-arco');
    })->name('eredivisie-disparo-arco');
    Route::get('/eredivisie-fouls', function () {
        return view('paisesbajos.fouls');
    })->name('eredivisie-fouls');

    //Colombia
    Route::get('/colombia-primera-a-corners', function () {
        return view('colombia.corners');
    })->name('colombia-primera-a-corners');
    Route::get('/colombia-primera-a-ht-ft', function () {
        return view('colombia.ht-ft');
    })->name('colombia-primera-a-ht-ft');
    Route::get('/colombia-primera-a-resultado', function () {
        return view('colombia.resultado');
    })->name('colombia-primera-a-resultado');
    Route::get('/colombia-primera-a-ambos-marcan', function () {
        return view('colombia.ambos_marcan');
    })->name('colombia-primera-a-ambos-marcan');
    Route::get('/colombia-primera-a-tarjetas', function () {
        return view('colombia.tarjetas');
    })->name('colombia-primera-a-tarjetas');
    Route::get('/colombia-primera-a-disparo-arco', function () {
        return view('colombia.disparo-arco');
    })->name('colombia-primera-a-disparo-arco');
    Route::get('/colombia-primera-a-fouls', function () {
        return view('colombia.fouls');
    })->name('colombia-primera-a-fouls');

    //Mexico
    Route::get('/liga-mx-corners', function () {
        return view('mexico.corners');
    })->name('liga-mx-corners');
    Route::get('/liga-mx-ht-ft', function () {
        return view('mexico.ht-ft');
    })->name('liga-mx-ht-ft');
    Route::get('/liga-mx-resultado', function () {
        return view('mexico.resultado');
    })->name('liga-mx-resultado');
    Route::get('/liga-mx-ambos-marcan', function () {
        return view('mexico.ambos_marcan');
    })->name('liga-mx-ambos-marcan');
    Route::get('/liga-mx-tarjetas', function () {
        return view('mexico.tarjetas');
    })->name('liga-mx-tarjetas');
    Route::get('/liga-mx-disparo-arco', function () {
        return view('mexico.disparo-arco');
    })->name('liga-mx-disparo-arco');
    Route::get('/liga-mx-fouls', function () {
        return view('mexico.fouls');
    })->name('liga-mx-fouls');

    //Brasil
    Route::get('/brasileirao-corners', function () {
        return view('brasil.corners');
    })->name('brasileirao-corners');
    Route::get('/brasileirao-ht-ft', function () {
        return view('brasil.ht-ft');
    })->name('brasileirao-ht-ft');
    Route::get('/brasileirao-resultado', function () {
        return view('brasil.resultado');
    })->name('brasileirao-resultado');
    Route::get('/brasileirao-ambos-marcan', function () {
        return view('brasil.ambos_marcan');
    })->name('brasileirao-ambos-marcan');
    Route::get('/brasileirao-tarjetas', function () {
        return view('brasil.tarjetas');
    })->name('brasileirao-tarjetas');
    Route::get('/brasileirao-disparo-arco', function () {
        return view('brasil.disparo-arco');
    })->name('brasileirao-disparo-arco');
    Route::get('/brasileirao-fouls', function () {
        return view('brasil.fouls');
    })->name('brasileirao-fouls');

     //champion league
     Route::get('/champion-league-corners', function () {
        return view('world.champion-league.corners');
    })->name('champion-league-corners');
    Route::get('/champion-league-ht-ft', function () {
        return view('world.champion-league.ht-ft');
    })->name('champion-league-ht-ft');
    Route::get('/champion-league-resultado', function () {
        return view('world.champion-league.resultado');
    })->name('champion-league-resultado');
    Route::get('/champion-league-ambos-marcan', function () {
        return view('world.champion-league.ambos_marcan');
    })->name('champion-league-ambos-marcan');
    Route::get('/champion-league-tarjetas', function () {
        return view('world.champion-league.tarjetas');
    })->name('champion-league-tarjetas');
    Route::get('/champion-league-disparo-arco', function () {
        return view('world.champion-league.disparo-arco');
    })->name('champion-league-disparo-arco');
    Route::get('/champion-league-fouls', function () {
        return view('world.champion-league.fouls');
    })->name('champion-league-fouls');

     //europa league
     Route::get('/europa-league-corners', function () {
        return view('world.europa-league.corners');
    })->name('europa-league-corners');
    Route::get('/europa-league-ht-ft', function () {
        return view('world.europa-league.ht-ft');
    })->name('europa-league-ht-ft');
    Route::get('/europa-league-resultado', function () {
        return view('world.europa-league.resultado');
    })->name('europa-league-resultado');
    Route::get('/europa-league-ambos-marcan', function () {
        return view('world.europa-league.ambos_marcan');
    })->name('europa-league-ambos-marcan');
    Route::get('/europa-league-tarjetas', function () {
        return view('world.europa-league.tarjetas');
    })->name('europa-league-tarjetas');
    Route::get('/europa-league-disparo-arco', function () {
        return view('world.europa-league.disparo-arco');
    })->name('europa-league-disparo-arco');
    Route::get('/europa-league-fouls', function () {
        return view('world.europa-league.fouls');
    })->name('europa-league-fouls');

     //europa conference league
     Route::get('/europa-conference-league-corners', function () {
        return view('world.europa-conference-league.corners');
    })->name('europa-conference-league-corners');
    Route::get('/europa-conference-league-ht-ft', function () {
        return view('world.europa-conference-league.ht-ft');
    })->name('europa-conference-league-ht-ft');
    Route::get('/europa-conference-league-resultado', function () {
        return view('world.europa-conference-league.resultado');
    })->name('europa-conference-league-resultado');
    Route::get('/europa-conference-league-ambos-marcan', function () {
        return view('world.europa-conference-league.ambos_marcan');
    })->name('europa-conference-league-ambos-marcan');
    Route::get('/europa-conference-league-tarjetas', function () {
        return view('world.europa-conference-league.tarjetas');
    })->name('europa-conference-league-tarjetas');
    Route::get('/europa-conference-league-disparo-arco', function () {
        return view('world.europa-conference-league.disparo-arco');
    })->name('europa-conference-league-disparo-arco');
    Route::get('/europa-conference-league-fouls', function () {
        return view('world.europa-conference-league.fouls');
    })->name('europa-conference-league-fouls');

});

//no es necesario esta autenticado

//Inglaterra
//Premier
Route::get('/premier-league', function () {
    return view('inglaterra.premier.index');
})->name('premier-league');

//FA CUP
Route::get('/fa-cup', function () {
    return view('inglaterra.facup.index');
})->name('fa-cup');

Route::get('/fa-cup-ambos-marcan', function () {
    return view('inglaterra.facup.ambos_marcan');
})->name('fa-cup-ambos-marcan');

Route::get('/fa-cup-resultado', function () {
    return view('inglaterra.facup.resultado');
})->name('fa-cup-resultado');

Route::get('/fa-cup-ht-ft', function () {
    return view('inglaterra.facup.ht-ft');
})->name('fa-cup-ht-ft');


//España
Route::get('/la-liga', function () {
    return view('espania.index');
})->name('la-liga');

//Italia
Route::get('/el-calcio', function () {
    return view('italia.index');
})->name('el-calcio');

//Alemania
Route::get('/bundesliga', function () {
    return view('alemania.index');
})->name('bundesliga');

//Argentina
// --Copa de la liga --
Route::get('/copa-de-la-liga-argentina', function () {
    return view('argentina.index');
})->name('copa-de-la-liga-argentina');


// --Super liga --
Route::get('/super-liga-argentina', function () {
    return view('argentina.superliga.index');
})->name('super-liga-argentina');

//Francia
Route::get('/ligue1', function () {
    return view('francia.index');
})->name('ligue1');

//Portugal
Route::get('/primeiraliga', function () {
    return view('portugal.index');
})->name('primeiraliga');

//Chile
Route::get('/chile-primera-division', function () {
    return view('chile.index');
})->name('chile-primera-division');

//Paises bajos
Route::get('/eredivisie', function () {
    return view('paisesbajos.index');
})->name('eredivisie');

//Colombia
Route::get('/colombia-primera-a', function () {
    return view('colombia.index');
})->name('colombia-primera-a');

//Mexico
Route::get('/liga-mx', function () {
    return view('mexico.index');
})->name('liga-mx');

//Brasil
Route::get('/brasileirao', function () {
    return view('brasil.index');
})->name('brasileirao');

//Champion league
Route::get('/champion-league', function () {
    return view('world.champion-league.index');
})->name('champion-league');

//Europa league
Route::get('/europa-league', function () {
    return view('world.europa-league.index');
})->name('europa-league');

//Europa conference league
Route::get('/europa-conference-league', function () {
    return view('world.europa-conference-league.index');
})->name('europa-conference-league');


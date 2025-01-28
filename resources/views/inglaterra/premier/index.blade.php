<x-app-layout>
@include('navigation2', include(app_path('rutas/inglaterra/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php session()->forget('temporada'); ?>
                <livewire:tabla-goles    :pais="'Inglaterra'" :liga="'la-premier-league'"  :nombreModelo="'PremierLeagueFixture'"/>
            </div>
        </div>
    </div>
</x-app-layout>        



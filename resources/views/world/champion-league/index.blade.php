<x-app-layout>
@include('navigation2', include(app_path('rutas/world/champion-league/navigation2-params.php')))

    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:tabla-goles  :pais="'World'" :liga="'champion-league'" :temPorDefecto="'ChampionLeague2023'" :temp2023="'ChampionLeague2023'" />
            </div>
        </div>
    </div>
</x-app-layout>
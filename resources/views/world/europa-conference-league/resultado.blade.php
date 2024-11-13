<x-app-layout>
@include('navigation2', include(app_path('rutas/world/europa-conference-league/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:resultado  :pais="'World\EuropaConferenceLeague'" :liga="'europa-conference-league'" :nombreModelo="'EuropaConferenceLeague'" />
            </div>
        </div>
    </div>
</x-app-layout>
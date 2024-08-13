<x-app-layout>
@include('navigation2', include(app_path('rutas/world/europa-conference-league/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:half-time-full-time  :pais="'World'"  :liga="'europa-conference-league'" :temPorDefecto="'EuropaConferenceLeague2023'" :temp2023="'EuropaConferenceLeague2023'" />
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
@include('navigation2', include(app_path('rutas/alemania/navigation2-params.php')))
    <div class="py-3">
       
        <div id="corners" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:fouls :pais="'Alemania'" :liga="'la-bundesliga'" :nombreModelo="'FixtureLaBundesligaStat'"/>
            </div>
        </div>
    </div>
</x-app-layout>
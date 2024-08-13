<x-app-layout>
@include('navigation2', include(app_path('rutas/brasil/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tarjetas :pais="'Brasil'" :liga="'brasileirao'" :temPorDefecto="'BrasileiraoStat2024'" :temp2024="'BrasileiraoStat2024'" />
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
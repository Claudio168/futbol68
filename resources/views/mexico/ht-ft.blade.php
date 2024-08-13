<x-app-layout>
@include('navigation2', include(app_path('rutas/mexico/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:half-time-full-time :pais="'Mexico'" :liga="'liga-mx'" :temPorDefecto="'LigaMX2023'" :temp2023="'LigaMX2023'" />
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
@include('navigation2', include(app_path('rutas/espania/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:half-time-full-time :pais="'Espania'" :liga="'la-liga'"  :temPorDefecto="'SubirLaLigaFixture2023'" :temp2023="'SubirLaLigaFixture2023'" :temp2022="'SubirLaLigaFixture2022'" :temp2021="'SubirLaLigaFixture2021'" :temp2020="'SubirLaLigaFixture2020'"/>
            </div>
        </div>
    </div>
</x-app-layout>
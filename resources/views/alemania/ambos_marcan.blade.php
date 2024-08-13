<x-app-layout>
@include('navigation2', include(app_path('rutas/alemania/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:ambos-marcan :pais="'Alemania'" :liga="'la-bundesliga'" :temPorDefecto="'SubirLaBundesligaFixture2023'" :temp2023="'SubirLaBundesligaFixture2023'" :temp2022="'SubirLaBundesligaFixture2022'" :temp2021="'SubirLaBundesligaFixture2021'" :temp2020="'SubirLaBundesligaFixture2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
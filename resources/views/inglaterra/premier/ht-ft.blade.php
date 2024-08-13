<x-app-layout>
@include('navigation2', include(app_path('rutas/inglaterra/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:half-time-full-time :pais="'Inglaterra'" :liga="'la-premier-league'" :temPorDefecto="'PremierLeagueFixture2023'"  :temp2023="'PremierLeagueFixture2023'" :temp2022="'PremierLeagueFixture2022'" :temp2021="'PremierLeagueFixture2021'" :temp2020="'PremierLeagueFixture2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
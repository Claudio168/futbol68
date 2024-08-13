<x-app-layout>
@include('navigation2', include(app_path('rutas/portugal/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:half-time-full-time :pais="'Portugal'" :liga="'primeiraliga'" :temPorDefecto="'Primeira_liga2023'" :temp2023="'Primeira_liga2023'" :temp2022="'Primeira_liga2022'" :temp2021="'Primeira_liga2021'" :temp2020="'Primeira_liga2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
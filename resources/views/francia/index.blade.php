<x-app-layout>
@include('navigation2', include(app_path('rutas/francia/navigation2-params.php')))


    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:tabla-goles :pais="'Francia'" :liga="'ligue1'" :temPorDefecto="'Ligue1_2023'" :temp2023="'Ligue1_2023'" :temp2022="'Ligue1_2022'" :temp2021="'Ligue1_2021'" :temp2020="'Ligue1_2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
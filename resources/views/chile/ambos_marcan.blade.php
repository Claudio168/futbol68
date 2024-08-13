<x-app-layout>
@include('navigation2', include(app_path('rutas/chile/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:ambos-marcan :pais="'Chile'" :liga="'chile-primera-division'" :temPorDefecto="'Chile_primera_division2024'" :temp2024="'Chile_primera_division2024'" :temp2023="'Chile_primera_division2023'" :temp2022="'Chile_primera_division2022'" :temp2021="'Chile_primera_division2021'" :temp2020="'Chile_primera_division2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
@include('navigation2', include(app_path('rutas/argentina/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:resultado :pais="'Argentina'" :liga="'copa-de-la-liga'" :nombreModelo="'CopaDeLaLiga'"  />
        </div>
    </div>
</x-app-layout>
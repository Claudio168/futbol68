<x-app-layout>
@include('navigation2', include(app_path('rutas/inglaterra/navigation2-facup.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:ambos-marcan :pais="'Inglaterra\FACup'" :liga="'facup'"  :nombreModelo="'FACup'"/>
            </div>
        </div>
    </div>
</x-app-layout>
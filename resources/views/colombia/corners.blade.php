<x-app-layout>
@include('navigation2', include(app_path('rutas/colombia/navigation2-params.php')))

    <div class="py-3">
       
        <div id="corners" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:corners :pais="'Colombia'" :liga="'colombia-primera-a'" :temPorDefecto="'ColombiaAperturaStat2024'"  :temp2024="'ColombiaAperturaStat2024'" />
            </div>
        </div>
    </div>
</x-app-layout>
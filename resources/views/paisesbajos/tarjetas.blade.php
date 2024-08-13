<x-app-layout>
@include('navigation2', include(app_path('rutas/paisesbajos/navigation2-params.php')))
    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tarjetas  :pais="'PaisesBajos'" :liga="'eredivisie'" :temPorDefecto="'EredivisieStat2023'"  :temp2023="'EredivisieStat2023'" />
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
@include('navigation2', include(app_path('rutas/italia/navigation2-params.php')))

    <div class="py-3">
       
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <livewire:tabla-goles :pais="'Italia'" :liga="'el-calcio'" :temPorDefecto="'SubirElCalcioFixture2023'" :temp2023="'SubirElCalcioFixture2023'" :temp2022="'SubirElCalcioFixture2022'" :temp2021="'SubirElCalcioFixture2021'" :temp2020="'SubirElCalcioFixture2020'" />
            </div>
        </div>
    </div>
</x-app-layout>
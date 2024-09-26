<x-app-layout>
    @if($periodo != null)
    <x-slider :inscritos="$inscritos" :dias_finalizar="$dias_finalizar" :periodo="$periodo">
    </x-slider>
    @endif
    <x-new-dashboard>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <div class="py-10">
                            <div class="max-w mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="grid grid-cols-3 place-content-center mb-5">
                                        <div>
                                            <img class="m-auto h-24 rounded-lg" alt="logo_ludovico" src="{{URL::asset('/img/ludovico.jpeg')}}" />
                                        </div>
                                        <div>
                                            <img class="m-auto h-24 rounded-lg" alt="logo_albertoravell" src="{{URL::asset('/img/albertoravell.jpeg')}}" />
                                        </div>
                                        <div>
                                            <img class="m-auto h-24 rounded-lg" alt="logo_mision" src="{{URL::asset('/img/misionsucre.jpg')}}" />
                                        </div>
                                    </div>
                                    <div class="relative overflow-x-auto">

                                        <h4 class="text-xl mb-5 text-center font-bold dark:text-white">Cómo usar el sistema de inscripción escolar SIESCO</h4>

                                        <ul class="space-y-4 text-gray-700 list-disc list-inside dark:text-gray-400">
                                            PASO A PASO
                                            <ul class=" ps-5 mt-2 space-y-1 list-decimal list-inside">
                                                <li>Agregar periodo académico</li>
                                                <li>Registrar docentes</li>
                                                <li>Agregar clases</li>
                                                <li>Registrar clases</li>
                                                <li>Registrar representante</li>
                                                <li>Registrar alumno</li>
                                                <li>Al finalizar le será posible acceder a todos los datos registrados en sus menús correspondientes</li>
                                                <li>Para finalizar un periodo academico sólo basta con establecer uno nuevo</li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-new-dashboard>
</x-app-layout>
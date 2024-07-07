<x-app-layout>
    <x-new-dashboard>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <div class="py-10">
                            <div class="max-w mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="relative overflow-x-auto">
                                        <h4 class="text-xl text-center font-bold dark:text-white">ALUMNOS INSCRITOS</h4>
                                        <h5 class="text-lime-500 py-5">N° de inscritos: {{$inscritos->count()}}</h5>
                                        <table class="mb-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">
                                                        Alumnos
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        Grado
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        Seccion
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        Docente
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        Periodo
                                                    </th>
                                                    <th scope="col" class="px-6 py-4">
                                                        Turno
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($inscritos as $inscrito)
                                                <a></a>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{$inscrito->alumno->primer_apellido . ' ' . $inscrito->alumno->segundo_apellido .', '. $inscrito->alumno->primer_nombre . ' ' . $inscrito->alumno->segundo_nombre}}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{$inscrito->clase->grado->grado}}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$inscrito->clase->seccion->seccion}}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$inscrito->clase->docente->apellido . ', ' . $inscrito->clase->docente->nombre}}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$inscrito->periodo->inicio .'/'. $inscrito->periodo->fin}}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        {{$inscrito->clase->turno}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{$inscritos->links()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-new-dashboard>
</x-app-layout>
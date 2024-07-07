<x-app-layout>
    <x-new-dashboard>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <div class="py-10">
                            <div class="max-w mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="relative overflow-x-hidden">
                                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                            <div class="relative overflow-x-auto">
                                                <h4 class="text-xl text-center font-bold dark:text-white">CLASES DEL PERIODO ACTUAL</h4>
                                                <h5 class="text-lime-500 py-5">N° de clases: {{$clases->count()}}</h5>
                                                <table class="mb-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-4">
                                                                Grado
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Sección
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Docente
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Periodo
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Aula
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Turno
                                                            </th>
                                                            <th scope="col" class="px-6 py-4">
                                                                Editar
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach ($clases as $clase)
                                                        <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <a href="/clase/{{$clase->id}}/alumnos">
                                                                    {{$clase->grado->grado}}
                                                                </a>
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                {{$clase->seccion->seccion}}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{$clase->docente->nombre}}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{$clase->periodo->inicio .'/'. $clase->periodo->fin}}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{$clase->aula}}
                                                            </td>

                                                            <td class="px-6 py-4">
                                                                {{$clase->turno}}
                                                            </td>
                                                            <td class="text-center px-6 py-4">
                                                                <a href="/clases/editar/{{$clase->id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                                    Editar
                                                            </td>
                                                        </tr>
                                                        </a>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div>{{$clases->links()}}</div>
                                            </div>
                                        </div>
                                    </div>
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
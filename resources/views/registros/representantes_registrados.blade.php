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
                                        <h4 class="text-xl mb-5 text-center font-bold dark:text-white">REPRESENTANTES REGISTRADOS</h4>
                                        <table class="mb-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        Nombre
                                                    </th>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        Cédula
                                                    </th>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        Dirección
                                                    </th>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        fecha de nacimiento
                                                    </th>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        Teléfono
                                                    </th>
                                                    <th scope="col" class="text-center px-6 py-4">
                                                        Editar
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($representantes as $representante)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <a href="/representantes/editar/{{$representante->id}}">
                                                            {{$representante->nombre . ' ' . $representante->apellido}}
                                                        </a>
                                                    </th>
                                                    <td class="text-center px-6 py-4">
                                                        {{$representante->cedula}}
                                                    </td>
                                                    <td class="text-center px-6 py-4">
                                                        {{$representante->direccion}}
                                                    </td>
                                                    <td class="text-center px-6 py-4">
                                                        {{$representante->fecha_nacimiento}}
                                                    </td>
                                                    <td class="text-center px-6 py-4">
                                                        {{$representante->telefono}}
                                                    </td>
                                                    <td class="text-center px-6 py-4">
                                                        <a href="/representantes/editar/{{$representante->id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                            Editar
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div>{{$representantes->links()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </x-new-dashboard>
</x-app-layout>
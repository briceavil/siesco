<x-app-layout>
  <x-new-dashboard>
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form class="max-w-md mx-auto" action="/clases/actualizar" autocomplete="off" method="POST">
            @csrf
            @method('PUT')
            <input name="id" type="hidden" value="{{$clase->id}}">
            <h4 class="text-xl mb-5 text-center font-bold dark:text-white">MODIFICAR CLASE</h4>
            <div class="grid md:grid-cols-2 md:gap-6">
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grado</label>
                <select required name="grado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione el grado</option>
                  @foreach($grado as $item)
                  <option value="<?php echo $item->id ?>">{{$item->grado}}</option>
                  @endforeach
                </select>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seccion</label>
                <select required name="seccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione la sección</option>
                  @foreach($seccion as $item)
                  <option value="<?php echo $item->id ?>">{{$item->seccion}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="grid mb-5 md:grid-cols-2 md:gap-6">
              <div class="relative z-0 w-full group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periodo</label>
                <select required name="periodo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione el periódo</option>
                  @foreach($periodo as $item)
                  <option value="<?php echo $item->id ?>">{{$item->inicio .' - '. $item->fin}}</option>
                  @endforeach
                </select>
              </div>
              <div class="relative z-0 w-full group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Turno</label>
                <select required name="turno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione el turno</option>
                  <option value="Mañana">Mañana</option>
                  <option value="Tarde">Tarde</option>
                </select>
              </div>
            </div>

            <div class="grid mb-5 md:grid-cols-2 md:gap-6">
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Docente</label>
                <select required name="docente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione el docente</option>
                  @foreach($docentes as $item)
                  <option value="<?php echo $item->id ?>">{{$item->apellido .', '. $item->nombre}}</option>
                  @endforeach
                </select>
              </div>

              <div class="relative z-0 w-full mb-5 group">
                <label for="aulas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aula</label>
                <input required type="text" name="aula" id="floating_aula" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              </div>

            </div>

            <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear clase</button>
          </form>
        </div>
      </div>
    </div>
  </x-new-dashboard>
</x-app-layout>
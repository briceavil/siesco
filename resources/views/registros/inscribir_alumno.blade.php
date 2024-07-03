<x-app-layout>
  <x-new-dashboard>
    <div class="py-10">
      <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <form class="max-w-md mx-auto" action="/registrar/inscripcion" autocomplete="off" method="POST">
              @csrf
              <label for="countries" class="block mb-4 text-2xl font-medium text-gray-900 dark:text-white">Inscribir al alumno</label>

              @if(session('alumno'))
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Representado</label>
                <select name="alumno_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione al alumno</option>
                  @foreach(session('alumno')->representante->alumnos as $item)
                  <option value="<?php echo $item->id ?>">{{$item->primer_apellido .' '. $item->segundo_apellido .', '. $item->primer_nombre .' '. $item->segundo_nombre}}</option>
                  @endforeach
                </select>
              </div>
              @endif

              @if($representante)
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Representado</label>
                <select name="alumno_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione al alumno</option>
                  @foreach($representante->alumnos as $item)
                  <option value="<?php echo $item->id ?>">{{$item->primer_apellido .' '. $item->segundo_apellido .', '. $item->primer_nombre .' '. $item->segundo_nombre}}</option>
                  @endforeach
                </select>
              </div>
              @endif

              @if(session('representante'))
              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Representado</label>
                <select required name="alumno_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione al alumno</option>
                  @foreach(session('representante')->alumnos as $item)
                  <option value="<?php echo $item->id ?>">{{$item->primer_apellido .' '. $item->segundo_apellido .', '. $item->primer_nombre .' '. $item->segundo_nombre}}</option>
                  @endforeach
                </select>
              </div>
              @endif

              <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clase</label>
                <select required name="clase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="" selected disabled>Seleccione la clase</option>
                  @foreach($clases as $item)
                  <option value="<?php echo $item->id ?>">{{$item->grado->grado .' - grado sección'. ' '. $item->seccion->seccion .' - ('. $item->docente->nombre .')' }}</option>
                  @endforeach
                </select>
              </div>


              <div class="grid md:grid-cols md:gap-6">
              </div>
              <div class="grid md:grid-cols md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periodo</label>
                  <select name="periodo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione el periódo</option>
                    @foreach($periodo as $item)
                    <option value="<?php echo $item->id ?>">{{$item->inicio .' - '. $item->fin}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Procesar inscripcion</button>
            </form>
          </div>
        </div>
  </x-new-dashboard>
</x-app-layout>
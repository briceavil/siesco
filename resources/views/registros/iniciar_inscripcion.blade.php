<x-app-layout>
  <x-new-dashboard>
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form class="max-w-md mx-auto" action="/registrar/iniciar_inscripcion" autocomplete="off" method="POST">
            @csrf
            <label for="countries" class="block mb-4 text-2xl font-medium text-gray-900 dark:text-white">Inscribir al alumno</label>
            <label class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Ingrese cedula del representante para iniciar el proceso</label>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" value="{{old('cedula_representante')}}" name="cedula_representante" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cédula del representante</label>
            </div>

            <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
          </form>
        </div>
  </x-new-dashboard>
</x-app-layout>
@props(['inscritos','dias_finalizar','periodo'])
<div class="slider max-w mx-auto sm:px-6 lg:px-8">
    <div class="slide-track mt-5 max-w mx-auto">
        <div class="flex mr-7 mr-7 flex">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 18 21">
                how_to_reg
            </span>
            <p class="dark:text-lime-500">Alumnos inscritos: {{$inscritos}}</p>
        </div>

        <div class="flex mr-7 mr-7">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                calendar_month
            </span>
            <p class="dark:text-lime-500">Periodo académico: {{$periodo->inicio}} / {{$periodo->fin}}</p>
        </div>
        <div class="flex mr-7 mr-7">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined">
                timer
            </span>
            <p class="dark:text-lime-500">Días para finalizar el periodo académico: {{$dias_finalizar}}</p>
        </div>

        <div class="flex mr-7 mr-7 flex">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 18 21">
                how_to_reg
            </span>
            <p class="dark:text-lime-500">Alumnos inscritos: {{$inscritos}}</p>
        </div>

        <div class="flex mr-7 mr-7">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                calendar_month
            </span>
            <p class="dark:text-lime-500">Periodo académico: {{$periodo->inicio}} / {{$periodo->fin}}</p>
        </div>
        <div class="flex mr-7 mr-7">
            <span class="mr-2 dark:text-lime-500 material-symbols-outlined">
                timer
            </span>
            <p class="dark:text-lime-500">Días para finalizar el periodo académico: {{$dias_finalizar}}</p>
        </div>

    </div>
</div>
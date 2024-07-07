<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrosController;
use App\Models\Clase;
use App\Models\Docente;
use App\Models\Seccion;
use App\Models\Grado;
use App\Models\Inscripcion;
use App\Models\Periodo;
use App\Models\Representante;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Void_;
use SebastianBergmann\Type\VoidType;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $periodo = Periodo::orderBy('created_at', 'desc')->select('id', 'inicio', 'fin')->first();
    $fecha_actual = Carbon::now();
    $fecha_fin_periodo = Carbon::parse($periodo->fin);
    $dias_finalizar = round($fecha_actual->diffInDays($fecha_fin_periodo), 0, PHP_ROUND_HALF_UP);
    $inscritos = Inscripcion::where('periodo_id', $periodo->id)->count();
    return view('dashboard', compact('inscritos', 'periodo', 'dias_finalizar'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//RUTAS PARA REGISTRAR
Route::middleware('auth', 'verified')->group(function () {

    //ruta registrar REPRESENTANTE
    Route::get('/registrar/representante', function () {
        return view('registros.crear_representante');
    })->name('crear.representante');

    Route::post('/registrar/representante', [RegistrosController::class, 'representante'])->name('crear.representante.post');

    //ruta registrar ALUMNO

    Route::get('/alumnos/registrar', function () {

        $representante = Representante::all()->first();

        if (!$representante) {
            notify()->warning('Debe registrar al menos un representante para continuar');
            return redirect()->route('crear.representante');
        }
        return view('registros.crear_alumno');
    })->name('crear.alumno');

    Route::post('/alumnos/registrar', [RegistrosController::class, 'alumno'])->name('crear.alumno.post');

    //ruta registrar DOCENTE
    Route::get('/registrar/docente', function () {
        return view('registros.crear_docente');
    })->name('crear.docente');

    Route::post('/registrar/docente', [RegistrosController::class, 'docente'])->name('crear.docente.post');

    //ruta registrar clases

    Route::get('/registrar/clase', function () {
        $docentes = Docente::all();
        $seccion = Seccion::orderBy('seccion', 'asc')->get();
        $grado = Grado::orderBy('grado', 'asc')->get();
        $periodo = Periodo::latest()->limit(1)->get();


        if ($periodo == '[]') {
            notify()->warning('Debe establecer un periódo para continuar');
            return redirect()->route('crear.periodo');
        }

        if ($docentes == '[]') {
            notify()->warning('Debe registrar al menos un docente para continuar');
            return redirect()->route('crear.docente');
        }

        return view(
            'registros.crear_clase',
            compact('periodo', 'seccion', 'grado', 'docentes')
        );
    })->name('crear.clase');

    Route::post('/registrar/clase', [RegistrosController::class, 'clase'])->name('crear.clase.post');

    //rutas registrar inscripcion (recibe los datos una vez es registrado un alumno, unicamente funciona cuando es redireccionada desde alumno)

    Route::get('/registrar/inscripcion', function () {
        $seccion = Seccion::orderBy('seccion', 'asc')->get();
        $grado = Grado::orderBy('grado', 'asc')->get();
        $periodo = Periodo::latest()->limit(1)->get();
        $clases = Clase::where('periodo_id', $periodo->first()->id)->get();

        if (!$clases) {
            notify()->warning('Antes debe crear las clases');
            return view('registros.crear_clase');
        }

        if (!$grado) {
            notify()->warning('Antes debe crear las clases');
            return view('registros.crear_clase');
        }
        return view('registros.crear_inscripcion', compact('grado', 'clases', 'seccion', 'periodo'));
    })->name('crear.inscripcion');

    Route::post('/registrar/inscripcion', [RegistrosController::class, 'inscripcion'])->name('crear.inscripcion.post');


    //rutas registrar inscripcion (requieren tipear cedula)

    Route::get('/registrar/iniciar_inscripcion', function () {
        $clase = Clase::all()->first();
        if (!$clase) {
            notify()->warning('Antes debe crear las clases');
            return redirect()->route('crear.clase');
        }
        return view('registros.iniciar_inscripcion');
    })->name('iniciar.inscripcion');

    Route::post('/registrar/iniciar_inscripcion', [RegistrosController::class, 'iniciarInscripcion'])->name('iniciar.inscripcion.post');

    //ruta para inscribir alumno desde boton (actualmente eliminado) para ello requiere recirbir por get el id del representante
    Route::get('/alumnos/inscribir/{id_representante}', function ($id_representante) {
        $seccion = Seccion::orderBy('seccion', 'asc')->get();
        $grado = Grado::orderBy(
            'grado',
            'asc'
        )->get();
        $periodo = Periodo::latest()->limit(1)->get();
        $clases = Clase::orderBy('turno', 'asc')->get();
        $representante = Representante::find($id_representante);
        if (!$clases->first()) {
            notify()->warning('Antes debe crear las clases');
            return redirect()->route('crear.clase');
        }
        return view('registros.inscribir_alumno', compact('clases', 'periodo', 'grado', 'seccion', 'representante'));
    })->name('inscribir.alumno');

    //rutas para registrar el periodo academico

    Route::post('/registrar/periodo_academico', [RegistrosController::class, 'periodoAcademico'])->name('crear.periodo.post');
    Route::get('/registrar/periodo_academico', function () {
        $periodo = Periodo::latest()->limit(1)->first();
        return view('registros.crear_periodo', compact('periodo'));
    })->name('crear.periodo');
});

//RUTAS PARA EDITAR

Route::middleware('auth', 'verified')->group(function () {

    //editar alumnos
    Route::get('/alumnos/editar/{id}', [RegistrosController::class, 'editar_alumno'])->name('editar.alumno');

    Route::put('/alumnos/actualizar', [RegistrosController::class, 'actualizar_alumno'])->name('actualizar.alumno');

    //editar docentes

    Route::get('/docentes/editar/{id}', [RegistrosController::class, 'editar_docente'])->name('editar.docente');

    Route::put('/docentes/actualizar', [RegistrosController::class, 'actualizar_docente'])->name('actualizar.docente');

    //editar representantes

    Route::get('/representantes/editar/{id}', [RegistrosController::class, 'editar_representante'])->name('editar.representante');

    Route::put('/representantes/actualizar', [RegistrosController::class, 'actualizar_representante'])->name('actualizar.representante');

    //editar clases

    Route::get('/clases/editar/{id}', [RegistrosController::class, 'editar_clase'])->name('editar.clase');

    Route::put('/clases/actualizar', [RegistrosController::class, 'actualizar_clase'])->name('actualizar.clase');
});


//rutas para para mostrar registros

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/inscritos', [RegistrosController::class, 'inscritos'])->name('inscritos');
    Route::get('/alumnos/registrados', [RegistrosController::class, 'alumnos_registrados'])->name('alumnos.registrados');
    Route::get('/representantes/registrados', [RegistrosController::class, 'representantes_registrados'])->name('representantes.registrados');
    Route::get('/docentes/registrados', [RegistrosController::class, 'docentes_registrados'])->name('docentes.registrados');
    Route::get('/clases/registradas', [RegistrosController::class, 'clases_registradas'])->name('clases.registradas');
    Route::get('/clase/{id}/alumnos', [RegistrosController::class, 'clase_alumnos'])->name('clase.alumnos');
});

require __DIR__ . '/auth.php';

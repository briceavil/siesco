<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRegistrosRequest;
use App\Http\Requests\RepresentanteRegistrosRequest;
use App\Models\Representante;
use App\Models\Alumno;
use App\Models\Clase;
use App\Models\Docente;
use App\Models\Grado;
use App\Models\Inscripcion;
use App\Models\Periodo;
use App\Models\Seccion;
use App\Models\User;
use Illuminate\Http\Request;
use Pest\Plugins\Parallel\Handlers\Pest;

class RegistrosController extends Controller
{
    public function representante(RepresentanteRegistrosRequest $request)
    {
        $registro_representante = Representante::select('id')->where('cedula', $request->cedula_representante)->first();
        if (!$registro_representante) {
            $representante = new Representante();
            $representante->cedula = $request->cedula_representante;
            $representante->nombre = strtoupper($request->nombre_representante);
            $representante->apellido = strtoupper($request->apellido_representante);
            $representante->direccion = $request->direccion;
            $representante->sexo = $request->sexo;
            $representante->correo = $request->correo_representante;
            $representante->telefono = $request->telefono;
            $representante->telefono_2 = $request->telefono_2;
            $representante->profesion = $request->oficio;
            $representante->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $representante->save();
            notify()->success('El representante fué registrado con éxito');
            return redirect()->route('crear.alumno');
        }
        if ($registro_representante) {
            notify()->warning('El representante ya existe');
            return redirect()->route('crear.representante');
        }
    }


    public function docente(Request $request)
    {
        $registro_docente = docente::select('id')->where('cedula', $request->cedula_docente)->first();
        if (!$registro_docente) {
            $docente = new docente();
            $docente->cedula = $request->cedula_docente;
            $docente->nombre = strtoupper($request->nombre_docente);
            $docente->apellido = strtoupper($request->apellido_docente);
            $docente->direccion = $request->direccion;
            $docente->correo = $request->correo_docente;
            $docente->sexo = $request->sexo;
            $docente->telefono = $request->telefono;
            $docente->telefono_2 = $request->telefono_2;
            $docente->profesion = $request->profesion;
            $docente->especialidad = $request->especialidad;
            $docente->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $docente->save();
            notify()->success('El docente fué registrado con éxito');
            return redirect()->route('docentes.registrados');
        }
        if ($registro_docente) {
            notify()->warning('El docente ya existe');
            return redirect()->route('crear.docente');
        }
    }


    public function iniciarInscripcion(Request $request)
    {
        $representante = Representante::where('cedula', $request->cedula_representante)->first();

        if (!$representante) {
            notify()->warning('El representante aun no se ha registrado');
            return redirect()->route('crear.representante');
        }
        return redirect()->route('crear.inscripcion')->with(['representante' => $representante]);
    }

    public function inscripcion(Request $request)
    {
        //para que las tablas (Alumnos, representante, clase y periodo) contengan registros antes de procesar una inscripcion
        $alumno = Alumno::find($request->alumno_id);
        $periodo = Periodo::orderBy('created_at', 'desc')->first();
        $clase = Clase::where('periodo_id', $periodo->id)->first();
        //comprobar que el alumno se encuentre registrado solo una vez durante el periodo en curso
        $inscrito = Inscripcion::where('alumno_id', $alumno->id, 'and')
            ->where('periodo_id', $periodo->id)->first();


        if ($inscrito) {
            notify()->warning('Este alumno ya fué inscrito ');
            return redirect()->route('inscritos');
        }

        if (!$alumno) {
            notify()->warning('Primero debes registrar al alumno ');
            return redirect()->route('crear.alumno');
        }

        $representante = $alumno->representante;

        if (!$representante) {
            notify()->warning('Primero debes registrar al representante ');
            return redirect()->route('crear.representante');
        }


        if (!$clase) {
            notify()->warning('Primero debes agregar las clases ');
            return redirect()->route('crear.clase');
        }

        if (!$periodo) {
            notify()->warning('Primero debes agregar un periodo ');
            return redirect()->route('crear.periodo');
        }

        if (!$inscrito) {
            $inscripcion = new Inscripcion;
            $inscripcion->alumno_id = $request->alumno_id;
            $inscripcion->representante_id = $representante->id;
            $inscripcion->clase_id = $request->clase;
            $inscripcion->periodo_id = $request->periodo;
            $inscripcion->plantel_origen = $request->plantel_origen;
            $inscripcion->observacion = $request->observacion;
            $inscripcion->save();
            notify()->success('El alumno fué inscrito con éxito');
            return redirect()->route('inscritos');
        }
    }

    public function clase(Request $request)
    {
        //Clase::orderBy('created_at', 'desc')->get()->first();
        $clase = Clase::where('grado_id', '=', $request->grado, 'and')->where('seccion_id', '=', $request->seccion, 'and')->where('periodo_id', '=', $request->periodo)->first();
        $aula = Clase::where('periodo_id', $request->periodo)->where('aula', $request->aula)->first();

        if ($aula) {
            notify()->warning('El aula seleccionada no está disponible');
            return redirect()->route('crear.clase');
        }

        if (!$clase && !$aula) {
            $clase = new Clase();
            $clase->grado_id = $request->grado;
            $clase->seccion_id = $request->seccion;
            $clase->docente_id = $request->docente;
            $clase->periodo_id = $request->periodo;
            $clase->aula = strtoupper($request->aula);
            $clase->turno = $request->turno;
            $clase->save();
            notify()->success('La clase fué creada con éxito');
            return redirect()->route('clases.registradas');
        }
        notify()->warning('La clase ya existe');
        return redirect()->route('crear.clase');
    }

    public function alumno(AlumnoRegistrosRequest $request)
    {
        $registro_representante = Representante::select('id')->where('cedula', $request->cedula_representante)->first();
        $registro_alumno = Alumno::where('cedula', $request->cedula)->first();
        if (!$registro_representante) {
            notify()->warning('Primero debes registrar al representante ');
            return redirect()->route('crear.representante');
        }

        if (!$registro_alumno) {
            $alumno = new Alumno();
            $alumno->primer_nombre = strtoupper($request->primer_nombre);
            $alumno->segundo_nombre = strtoupper($request->segundo_nombre);
            $alumno->primer_apellido = strtoupper($request->primer_apellido);
            $alumno->segundo_apellido = strtoupper($request->segundo_apellido);
            $alumno->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $alumno->sexo = $request->sexo;
            $alumno->cedula = $request->cedula;
            $alumno->representante_id = $registro_representante->id;
            $alumno->direccion = $request->direccion;
            $alumno->observacion = $request->observacion;
            $alumno->save();
            notify()->success('El alumno fue registrado con éxito');
            return redirect()->route('crear.inscripcion')->with(['alumno' => $alumno]);
        }
    }

    public function editar_alumno($id)
    {
        $alumno = Alumno::find($id);
        if ($alumno) {
            $alumno->fecha_nacimiento = date('m/d/Y', strtotime($alumno->fecha_nacimiento));
            return view('editar.editar_alumno', compact('alumno'));
        }
        notify()->warning('El alumno no existe');
        return redirect()->route('dashboard');
    }

    public function actualizar_alumno(Request $request)
    {
        $alumno = Alumno::find($request->id);
        if ($alumno) {
            $alumno->primer_nombre = strtoupper($request->primer_nombre);
            $alumno->segundo_nombre = strtoupper($request->segundo_nombre);
            $alumno->primer_apellido = strtoupper($request->primer_apellido);
            $alumno->segundo_apellido = strtoupper($request->segundo_apellido);
            $alumno->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $alumno->sexo = $request->sexo;
            $alumno->cedula = $request->cedula;
            $alumno->direccion = $request->direccion;
            $alumno->observacion = $request->observacion;
            $alumno->save();
            notify()->success('El alumno fue actualizado con éxito');
            return redirect()->route('alumnos.registrados');
        }
        notify()->warning('El alumno no existe');
        return redirect()->route('dashboard');
    }

    public function editar_docente($id)
    {
        $docente = Docente::find($id);
        if ($docente) {
            $docente->fecha_nacimiento = date('m/d/Y', strtotime($docente->fecha_nacimiento));
            return view('editar.editar_docente', compact('docente'));
        }
        notify()->warning('El docente no existe');
        return redirect()->route('dashboard');
    }

    public function editar_representante($id)
    {
        $representante = Representante::find($id);
        if ($representante) {
            $representante->fecha_nacimiento = date('m/d/Y', strtotime($representante->fecha_nacimiento));
            return view('editar.editar_representante', compact('representante'));
        }
        notify()->warning('El representante no existe');
        return redirect()->route('dashboard');
    }

    public function actualizar_docente(Request $request)
    {
        $docente = Docente::find($request->id);
        if ($docente) {
            $docente->nombre = strtoupper($request->nombre_docente);
            $docente->apellido = strtoupper($request->apellido_docente);
            $docente->cedula = $request->cedula_docente;
            $docente->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $docente->sexo = $request->sexo;
            $docente->telefono = $request->telefono;
            $docente->telefono = $request->telefono_2;
            $docente->direccion = $request->direccion;
            $docente->profesion = $request->profesion;
            $docente->especialidad = $request->especialidad;
            $docente->correo = $request->correo_docente;
            $docente->save();
            notify()->success('El docente fue actualizado con éxito');
            return redirect()->route('docentes.registrados');
        }
        notify()->warning('Ha ocurrido un error');
        return redirect()->route('dashboard');
    }

    public function actualizar_representante(Request $request)
    {
        $representante = representante::find($request->id);
        if ($representante) {
            $representante->nombre = strtoupper($request->nombre_representante);
            $representante->apellido = strtoupper($request->apellido_representante);
            $representante->cedula = $request->cedula_representante;
            $representante->fecha_nacimiento = date('Y-m-d', strtotime($request->fecha_nacimiento));
            $representante->sexo = $request->sexo;
            $representante->telefono = $request->telefono;
            $representante->telefono = $request->telefono_2;
            $representante->direccion = $request->direccion;
            $representante->profesion = $request->profesion;
            $representante->correo = $request->correo_representante;
            $representante->save();
            notify()->success('El representante fue actualizado con éxito');
            return redirect()->route('representantes.registrados');
        }
        notify()->warning('Ha ocurrido un error');
        return redirect()->route('dashboard');
    }


    public function editar_clase($id)
    {
        $clase = Clase::find($id);
        if ($clase) {
            $docentes = Docente::all();
            $seccion = Seccion::orderBy('seccion', 'asc')->get();
            $grado = Grado::orderBy('grado', 'asc')->get();
            $periodo = Periodo::latest()->limit(1)->get();
            return view('editar.editar_clase', compact('periodo', 'seccion', 'grado', 'docentes', 'clase'));
        }
        notify()->warning('La clase no existe');
        return redirect()->route('dashboard');
    }

    public function actualizar_clase(Request $request)
    {
        $claseRequest = Clase::find($request->id);
        if ($claseRequest) {

            $clase = Clase::where('grado_id', '=', $request->grado, 'and')->where('seccion_id', '=', $request->seccion, 'and')->where('periodo_id', '=', $request->periodo)->first();
            $aula = Clase::where('periodo_id', $request->periodo, 'and')->where('aula', $request->aula)->where('aula', '!=', $claseRequest->aula)->first();
            if (!$aula) {
                notify()->warning('El aula seleccionada no está disponible');
                return redirect()->route('crear.clase');
            }

            if (!$clase) {
                $clase->grado_id = $request->grado;
                $clase->seccion_id = $request->seccion;
                $clase->docente_id = $request->docente;
                $clase->periodo_id = $request->periodo;
                $clase->aula = strtoupper($request->aula);
                $clase->turno = $request->turno;
                $clase->save();
                notify()->success('La clase fué creada con éxito');
                return redirect()->route('clases.registradas');
            }
            notify()->warning('La clase ya existe');
            return redirect()->route('crear.clase');
        }
        notify()->warning('Ha ocurrido un error');
        return redirect()->route('dashboard');
    }
    public function inscritos()
    {
        $inscritos = Inscripcion::all()->first();
        if ($inscritos) {
            $periodo = Periodo::orderBy('created_at', 'desc')->first();
            $inscritos = Inscripcion::where('periodo_id', '=', $periodo->id)->paginate(3);
            return view('registros.inscritos', compact('inscritos'));
        }
        notify()->warning('No hay alumnos inscritos aún');
        return redirect()->route('dashboard');
    }

    public function alumnos_registrados()
    {
        $alumnos = Alumno::orderBy('created_at', 'desc')->paginate(3);
        return view('registros.alumnos_registrados', compact('alumnos'));
    }

    public function representantes_registrados()
    {
        $representantes = Representante::orderBy('created_at', 'desc')->paginate(3);
        return view('registros.representantes_registrados', compact('representantes'));
    }

    public function docentes_registrados()
    {
        $docentes = Docente::orderBy('created_at', 'desc')->paginate(3);
        return view('registros.docentes_registrados', compact('docentes'));
    }

    public function clases_registradas()
    {
        $registradas = Clase::all()->first();
        if ($registradas) {
            $periodo = Periodo::orderBy('created_at', 'desc')->first();
            $clases = Clase::where('periodo_id', $periodo->id)->paginate(3);
            return view('registros.clases_registradas', compact('clases'));
        }
        notify()->warning('Aún no hay clases registradas');
        return redirect()->route('dashboard');
    }

    public function periodoAcademico(Request $request)
    {
        $periodo = new Periodo();
        $periodo->inicio = date('Y-m-d', strtotime($request->inicio));
        $periodo->fin = date('Y-m-d', strtotime($request->fin));
        $periodo->save();
        notify()->success('El periódo fué registrado con éxito');
        return redirect()->route('crear.periodo');
    }
}

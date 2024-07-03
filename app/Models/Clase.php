<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $table = 'clases';
    protected $fillable = ['grado_id', 'seccion_id', 'docente_id', 'aula', 'turno'];


    public function alumnos()
    {
        return $this->belongsTo(Alumno::class);
    }
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}

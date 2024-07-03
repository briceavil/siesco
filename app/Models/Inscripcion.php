<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripcions';
    protected $fillable = [
        'alumno_id', 'representante_id', 'clase_id', 'periodo_academico_id',
        'plantel_origen', 'observacion'
    ];

    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }

    public function clase(){
        return $this->belongsTo(Clase::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
}


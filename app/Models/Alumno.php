<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = [
        'cedula', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'direccion',
        'fecha_nacimiento', 'sexo', 'observacion', 'representante_id'
    ];

    public function representante()
    {
        return $this->belongsTo(Representante::class);
    }

    public function inscrito()
    {
        return $this->hasMany(Inscripcion::class);
    }

    /**
     * Get the seccion that owns the Alumno
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}

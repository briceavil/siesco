<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    use HasFactory;

    protected $table = 'representantes';
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'fecha_nacimiento', 'telefono',
        'telefono_2', 'sexo', 'correo', 'profesion'
    ];


    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}

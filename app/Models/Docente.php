<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'fecha_nacimiento', 'direccion',
        'telefono', 'telefono_2', 'sexo', 'correo', 'profesion', 'especialidad'
    ];

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}

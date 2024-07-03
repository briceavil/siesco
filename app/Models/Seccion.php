<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'seccions';
    protected $fillable = ['seccion'];   

public function alumnos(){
    return $this->hasMany(Alumno::class);
}

}

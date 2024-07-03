<?php

use App\Models\Alumno;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('sexo');
            $table->string('telefono_2')->nullable();
            $table->string('correo')->nullable();
            $table->string('profesion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representantes');
    }
};

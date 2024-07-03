<?php

use App\Models\Grado;
use App\Models\Seccion;
use App\Models\Docente;
use App\Models\Periodo;
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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Grado::class);
            $table->foreignIdFor(Seccion::class);
            $table->foreignIdFor(Docente::class);
            $table->foreignIdFor(Periodo::class);
            $table->string('aula');
            $table->string('turno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};

<?php

use App\Models\Alumno;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Clase;
use App\Models\Periodo;
use App\Models\Representante;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Alumno::class);
            $table->foreignIdFor(Representante::class);
            $table->foreignIdFor(Clase::class);
            $table->foreignIdFor(Periodo::class);
            $table->string('plantel_origen')->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripcions');
    }
};

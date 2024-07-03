<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Representante;
use App\Models\Clase;
use App\Models\Periodo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscripcion>
 */
class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alumno_id' => Alumno::factory(),
            'representante_id' => Representante::factory(),
            'clase_id' => Clase::factory(),
            'periodo_id' => Periodo::factory(),
            'plantel_origen' => fake()->country(),
            'observacion' => fake()->text()
        ];
    }
}

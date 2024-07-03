<?php

namespace Database\Factories;

use App\Models\Grado;
use App\Models\Seccion;
use App\Models\Docente;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clase>
 */
class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grado_id' => Grado::factory(),
            'seccion_id' => Seccion::factory(),
            'docente_id' => Docente::factory(),
            'periodo_id' => Periodo::factory(),
            'aula' => 'A-' . random_int(1, 1000),
            'turno' => 'mañana/tarde',
        ];
    }
}

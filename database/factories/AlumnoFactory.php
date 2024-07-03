<?php

namespace Database\Factories;

use App\Models\Representante;
use App\Models\Clase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'primer_nombre' => fake()->firstName(),
            'segundo_nombre' => fake()->firstName(),
            'primer_apellido' => fake()->lastName(),
            'segundo_apellido' => fake()->lastName(),
            'cedula' => fake()->numberBetween(30000000, 40000000),
            'direccion' => fake()->address(),
            'fecha_nacimiento' => fake()->date('2009-01-01', now()),
            'sexo' => 'no',
            'observacion' => 'Especificar razon por la que fue dado de baja el alumno',
            'representante_id' => Representante::factory()
        ];
    }
}

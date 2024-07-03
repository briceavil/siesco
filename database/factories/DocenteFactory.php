<?php

namespace Database\Factories;

use App\Models\CLase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellido' => fake()->lastName(),
            'cedula' => fake()->numberBetween(2000000, 30000000),
            'fecha_nacimiento' => fake()->date(),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'telefono_2' => fake()->phoneNumber(),
            'correo' => fake()->email(),
            'sexo' => 'Masculino',
            'profesion' => fake()->jobTitle(),
            'especialidad' => fake()->jobTitle(),
        ];
    }
}

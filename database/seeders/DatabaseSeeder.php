<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Seccion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Daniel Briceño',
            'email' => 'test@example.com',
        ]);

        Grado::factory()->create([
            'id' => '1',
            'grado' => '1er Grado',
        ]);

        Grado::factory()->create([
            'id' => '2',
            'grado' => '2do Grado',
        ]);

        Grado::factory()->create([
            'id' => '3',
            'grado' => '3er Grado',
        ]);

        Grado::factory()->create([
            'id' => '4',
            'grado' => '4to Grado',
        ]);

        Grado::factory()->create([
            'id' => '5',
            'grado' => '5to Grado',
        ]);

        Grado::factory()->create([
            'id' => '6',
            'grado' => '6to Grado',
        ]);

        Seccion::factory()->create([
            'seccion' => 'A',
        ]);

        Seccion::factory()->create([
            'seccion' => 'B',
        ]);

        Seccion::factory()->create([
            'seccion' => 'D',
        ]);

        Seccion::factory()->create([
            'seccion' => 'E',
        ]);

        Seccion::factory()->create([
            'seccion' => 'F',
        ]);

        Seccion::factory()->create([
            'seccion' => 'G',
        ]);
    }
}

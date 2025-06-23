<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
    {
        $cursosPorCiclo = [
            'Ingenierías' => [
                'Cálculo Diferencial',
                'Álgebra Lineal',
                'Física General',
                'Programación en C++',
                'Estructura de Datos',
                'Sistemas Digitales',
                'Matemática Discreta',
                'Electrónica Básica',
            ],
            'Biomédicas' => [
                'Anatomía Humana',
                'Fisiología General',
                'Biología Celular',
                'Genética Molecular',
                'Química Orgánica',
                'Bioestadística',
                'Farmacología',
                'Microbiología',
            ],
            'Sociales' => [
                'Psicología General',
                'Sociología',
                'Historia del Perú',
                'Educación Cívica',
                'Antropología Cultural',
                'Comunicación Efectiva',
                'Filosofía Moderna',
                'Ética Profesional',
            ],
        ];

        foreach ($cursosPorCiclo as $nombreCiclo => $cursos) {
            $ciclo = Ciclo::create(['nombre' => $nombreCiclo]);

            foreach ($cursos as $nombreCurso) {
                Curso::create([
                    'nombre' => $nombreCurso,
                    'ciclo_id' => $ciclo->id,
                ]);
            }
        }
    }
}

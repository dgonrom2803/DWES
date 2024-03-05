<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadir varios cursos
        DB::table('courses')->insert(
            [
                'course' => '1DAW',
                'ciclo' => 'Desarrollo de Aplicaciones Web'
            ]
        );
        DB::table('courses')->insert(
            [
                'course' => '2DAW',
                'ciclo' => 'Desarrollo de Aplicaciones Web'
            ]
        );
        DB::table('courses')->insert(
            [
                'course' => '1AD',
                'ciclo' => 'Asistencia de Dirección'
            ]
        );
        DB::table('courses')->insert(
            [
                'course' => '2AD',
                'ciclo' => 'Asistencia de Dirección'
            ]
        );
        DB::table('courses')->insert(
            [
                'course' => Str::random(20),
                'ciclo' => Str::random(15) . 'FP'
            ]
        );
        DB::table('courses')->insert(
            [
                'course' => Str::random(20),
                'ciclo' => Str::random(15) . 'FP'
            ]
        );
    }
}

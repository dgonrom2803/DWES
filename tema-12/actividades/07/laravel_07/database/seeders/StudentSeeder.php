<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert(
            [
                [
                    'name' => 'Diego',
                    'last_name' => 'González Romero',
                    'birth_date' => '2001/03/28',
                    'phone_number' => '987654321',
                    'city' => 'Ubrique',
                    'dni' => '32567865A',
                    'email' => 'dgonrom2803@g.educaand.es',
                    'course_id' => 1
                ]
            ]
                );
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Student::class;
    public function definition(): array
    {
        return [

            'name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'city' => fake()->city(),
            'dni' => fake()->unique()->regexify('\d{8}[trwagmyfpdxbnjzsqvhlcke]'),
            'email' => fake()->unique()->safeEmail(),
            'course_id' => fake()->randomNumber(1,100)
        ];
    }
}

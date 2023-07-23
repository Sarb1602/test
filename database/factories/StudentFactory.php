<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Teacher;

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
        $teacherId = Teacher::inRandomOrder()->first()->id;
        return [
            // "t_id" => factory('App\Teacher')->create()->id,
            "teacher_id" => $teacherId,
            "name" => $this->faker->name(),
            "email" => $this->faker->safeEmail,
            "mobile" => $this->faker->phoneNumber,
            "age" => $this->faker->numberBetween(25, 45),
            "gender" => $this->faker->randomElement([
                "male",
                "female",
                "others"
            ]),
            "address_info" => $this->faker->address

            //
        ];
    }
}

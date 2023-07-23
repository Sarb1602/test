<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeacherSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     factory(App\Teacher::class, 50)->create()->each(function ($teacher) {
    //     $teacher->students()->save(factory(App\Student::class)->make());
    // });
        $teachers = Teacher::factory()->count(50)->create();

        // For each teacher, create associated students using the factory
        $teachers->each(function ($teacher) {
            Student::factory()->count(100)->create(['teacher_id' => $teacher->id]);
        });
        //
    }
}

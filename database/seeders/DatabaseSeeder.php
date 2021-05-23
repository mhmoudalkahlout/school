<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\ClassModel;
use App\Models\ClassStudent;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);

        \App\Models\Teacher::factory(100)->create();
        \App\Models\Student::factory(200)->create();

        $classes = \App\Models\ClassModel::factory(300)->create();
        ClassModel::chunk(300, function ($classes) {
            foreach ($classes as $class) {
                $student = Student::whereDoesntHave('classes', function($query) use ($class) {
                    $query->where('classes.id', $class->id);
                })->get()->random();
                
                ClassStudent::factory()->create(['class_id' => $class->id, 'student_id' => $student->id]);
            }
        });

        \App\Models\Mark::factory(700)->create();
    }
}

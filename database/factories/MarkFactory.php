<?php

namespace Database\Factories;

use App\Models\Mark;
use App\Models\ClassStudent;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement([Mark::FIRST_TYPE, Mark::MID_TYPE, Mark::FINAL_TYPE]);
        $classStudent = ClassStudent::whereDoesntHave('marks', function($query) use ($type) {
            $query->where('type', $type);
        })->get()->random();

        return [
            'type' => $type,
            'class_student_id' => $classStudent->id,
            'degree' => $this->faker->randomElement(['C', 'C+', 'B', 'B+', 'A', 'A+']),
        ];
    }
}

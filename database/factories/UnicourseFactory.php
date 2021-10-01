<?php

namespace Database\Factories;

use App\Models\Unicourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnicourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unicourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'university_id' => $this->faker->numberBetween($min = 1, $max = 7),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 17),
            'duration' => 4,
            'fee' => $this->faker->numberBetween($min = 10, $max = 500),
            'criteria' => "FSc 60%",
            'requirement' => "Academics, CNIC, Domicile",
            'closing' => date('Y-m-d'),
        ];
    }
}
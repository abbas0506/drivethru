<?php

namespace Database\Factories;

use App\Models\Favcourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavcourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favcourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'country_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 5),
        ];
    }
}
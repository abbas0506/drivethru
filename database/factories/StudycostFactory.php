<?php

namespace Database\Factories;

use App\Models\Studycost;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudycostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Studycost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'country_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'level_id' => $this->faker->numberBetween($min = 3, $max = 6),
            'minfee' => $this->faker->numberBetween($min = 100, $max = 400),
            'maxfee' => $this->faker->numberBetween($min = 100, $max = 300),
        ];
    }
}
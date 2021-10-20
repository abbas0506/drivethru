<?php

namespace Database\Factories;

use App\Models\Livingcost;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivingcostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Livingcost::class;

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
            'expensetype_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'minexp' => $this->faker->numberBetween($min = 100, $max = 400),
            'maxexp' => $this->faker->numberBetween($min = 100, $max = 300),
        ];
    }
}

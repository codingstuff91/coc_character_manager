<?php

namespace Database\Factories;

use App\Models\Capacity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapacityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Capacity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->word,
            'level'       => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text,
        ];
    }
}

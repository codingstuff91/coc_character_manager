<?php

namespace Database\Factories;

use App\Models\Advantage;
use App\Models\Character;
use App\Models\Family;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    private $genders = ['M', 'F'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => fake()->name(),
            'level'        => fake()->numberBetween(1, 5),
            'gender'       => fake()->randomElement($this->genders),
            'age'          => fake()->numberBetween(20, 50),
            'height'       => fake()->numberBetween(150, 200),
            'profile_id'   => Profile::inRandomOrder()->first()->id,
            'advantage_id' => Advantage::inRandomOrder()->first()->id,
            'family_id'    => Family::inRandomOrder()->first()->id,
        ];
    }
}

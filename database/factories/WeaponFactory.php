<?php

namespace Database\Factories;

use App\Enums\WeaponEnum;
use App\Models\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeaponFactory extends Factory
{
    protected $model = Weapon::class;
    public $damage_scores = ['2D6', '1D4', '1D10'];
    public $categories = ['contact', 'distance'];

    public function definition()
    {
        return [
            'name'          => $this->faker->word,
            'damage_score'  => $this->faker->randomElement($this->damage_scores),
            'category'      => $this->faker->randomElement($this->categories),
            'range'         => 0,
        ];
    }

    public function distance()
    {
        return $this->state([
            'category' => WeaponEnum::DISTANCE,
        ]);
    }

    public function contact()
    {
        return $this->state([
            'category' => WeaponEnum::CONTACT,
        ]);
    }
}

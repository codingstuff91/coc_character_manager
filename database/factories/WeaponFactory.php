<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Weapon;

class WeaponFactory extends Factory
{
    protected $model = Weapon::class;

    public $attackScores = ['2D6', '1D4', '1D10'];

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'dm_score' => $this->faker->randomElement($this->attackScores),
            'attack_score' => $this->faker->randomElement($this->attackScores),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}

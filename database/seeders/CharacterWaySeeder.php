<?php

namespace Database\Seeders;

use App\Models\Capacity;
use App\Models\CharacterWay;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Faker\Generator;

class CharacterWaySeeder extends Seeder
{
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    protected $characterWays = [
        "Voie de l'espionnage",
        "Voie du danger",
        "Voie des langues",
        "Voie des corporations",
        "Voie de l'investigation",
        "Voie de l'art",
        "Voie des armes à feu",
        "Voie de l'argent"
    ];

    /**
     * Create 10 Character ways and 5 level capacities for each of them
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->characterWays as $way) {
            CharacterWay::factory(10)->create([
                'name' => $way,
            ])->each(function($characterWay){
                for($i = 1; $i < 6; $i++) {
                    Capacity::factory()->for($characterWay)->create([
                        "level" => $i,
                        "description" => $this->faker->paragraph(2),
                    ]);
                }
            });
        }

    }
}

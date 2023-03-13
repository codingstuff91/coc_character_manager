<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Attribute;
use App\Models\Capacity;
use App\Models\Character;
use App\Models\Profile;
use App\Models\User;
use App\Models\Weapon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User creation
         $user = User::factory()->create([
             'name'  => 'mattou',
             'email' => 'mattou2812@gmail.com',
             'admin' => true,
         ]);

        $this->call(FamilySeeder::class);
        $this->call(CharacterWaySeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(AdvantageSeeder::class);

        // Capacities creation
//        Capacity::factory(10)->create();

        // Weapons creation
        $weapon = Weapon::factory(5)->create();

        // Character creation
        $character = Character::factory()->create();

        /**
         * Associate the character with user, weapon
         * attributes and capacities
         */
        $character->users()->attach($user);
        $character->weapons()->attach($weapon);

        foreach (Attribute::all() as $attribute) {
            DB::table('attribute_character')->insert([
                'attribute_id' => $attribute->id,
                'character_id' => $character->id,
                'value'        => fake()->numberBetween('1', '18'),
                'modificator'  => fake()->numberBetween('-4', '4'),
            ]);
        }

        foreach (Capacity::all()->random(3) as $capacity) {
            $character->capacities()->attach($capacity);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\CharacterWay;
use App\Models\Family;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Create 10 profiles
     * and foreach profile assign 3 random character ways
     *
     * @return void
     */
    public function run()
    {
        $families = Family::all();

        foreach ($families as $family) {
            Profile::factory(10)
                ->for($family)
                ->create();
        }

        $profiles = Profile::all();

        foreach ($profiles as $profile) {
            $randomCharacterWays = CharacterWay::all()->random(3);
            $profile->characterWays()->attach($randomCharacterWays);
        }
    }
}

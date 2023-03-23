<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactWeapons = Weapon::factory()->contact()->create();

        $distantWeapons = Weapon::factory()->distance()->create();
    }
}

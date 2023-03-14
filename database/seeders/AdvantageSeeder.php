<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Family;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Advantages creation for action profile (The first)
        Advantage::factory(5)->for(Family::first())->create();

        // Advantages creation for reflexion profile (The last and third one)
        Advantage::factory(5)->for(Family::find(3))->create();
    }
}

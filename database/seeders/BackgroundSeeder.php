<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\Character;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $character = Character::first();

        Background::factory()->for($character)->create();
    }
}

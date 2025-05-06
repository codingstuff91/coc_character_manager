<?php

namespace Database\Seeders;

use App\Models\Chronicle;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChronicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        Chronicle::factory()->for($user)->create();
    }
}

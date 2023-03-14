<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    public function run()
    {
        $families = [
            [
                'name'            => 'Action',
                'description'     => 'Dé de vie : D10',
                'life_dice_score' => 10,
            ],
            [
                'name'            => 'Aventure',
                'description'     => 'Dé de vie : D8 et +2 pts de chance',
                'life_dice_score' => 8,
            ],
            [
                'name'            => 'Réflexion',
                'description'     => 'Dé de vie : D6 et +2 pts de capacité',
                'life_dice_score' => 6,
            ],
        ];

        foreach ($families as $family) {
            Family::create([
                'name'            => $family['name'],
                'description'     => $family['description'],
                'life_dice_score' => $family['life_dice_score'],
            ]);
        }
    }
}

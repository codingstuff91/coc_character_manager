<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            'Force',
            'Dextérité',
            'Constitution',
            'Perception',
            'Charisme',
            'Intelligence',
            'Initiative',
            'Défense',
            'Armure',
            'Attaque contact',
            'Attaque distance',
            'Attaque magique',
            'Dé de vie',
            'Points vie',
            'Points vie max',
            'Blessure grave',
            'Resistance dégats',
            'Points chance',
            'Points chance max',
            'Niveau vie'
        ];

        foreach ($attributes as $attribute) {
            Attribute::create([
                'name'        => $attribute,
                'description' => '',
            ]);
        }
    }
}

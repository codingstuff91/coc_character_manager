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
            'Force'             => 'strength.png',
            'Dextérité'         => 'dexterity.png',
            'Constitution'      => 'constitution.png',
            'Perception'        => 'perception.png',
            'Charisme'          => 'charisma.png',
            'Intelligence'      => 'intelligence.png',
            'Initiative'        => 'initiative.png',
            'Défense'           => 'strength.png',
            'Armure'            => 'fiabilite.png',
            'Attaque contact'   => 'epee.png',
            'Attaque distance'  => 'distant_attack.png',
            'Attaque magique'   => 'magic.png',
            'Dé de vie'         => null,
            'Points vie'        => null,
            'Points vie max'    => null,
            'Blessure grave'    => null,
            'Resistance dégats' => null,
            'Points chance'     => null,
            'Points chance max' => null,
            'Niveau vie'        => null,
        ];

        foreach ($attributes as $attribute => $image) {
            Attribute::create([
                'name'        => $attribute,
                'description' => '',
                'image'       => $image,
            ]);
        }
    }
}

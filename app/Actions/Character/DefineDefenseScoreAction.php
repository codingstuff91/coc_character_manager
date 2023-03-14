<?php

namespace App\Actions\Character;

use App\Enums\AttributeEnum;
use App\Models\AttributeCharacter;
use App\Models\Character;

class DefineDefenseScoreAction
{
    public function calculateDefenseScore(int $dexterityModificator)
    {
        return (10 + $dexterityModificator);
    }
    public function execute(Character $character, array $characterAttributes)
    {
        $defenseScore = $this->calculateDefenseScore($characterAttributes['dexterity']['modificator']);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::INITIATIVE,
            'character_id' => $character->id,
            'value'        => $characterAttributes['dexterity']['score'],
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::DEFENSE,
            'character_id' => $character->id,
            'value'        => $defenseScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::ARMOR,
            'character_id' => $character->id,
            'value'        => 0,
            'modificator'  => 0,
        ]);
    }
}

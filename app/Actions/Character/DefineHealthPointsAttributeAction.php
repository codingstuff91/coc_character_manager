<?php

namespace App\Actions\Character;

use App\Models\AttributeCharacter;
use App\Models\Character;

class DefineHealthPointsAttributeAction
{
    public function calculateHealthPointsScore(int $modificator, array $family): int
    {
        return ($modificator + $family['lifeDiceScore']);
    }
    public function execute(Character $character, array $characterAttributes, array $family)
    {
        $healthPointsScore = $this->calculateHealthPointsScore($characterAttributes['constitution']['modificator'], $family);

        AttributeCharacter::create([
            'attribute_id' => 14,
            'character_id' => $character->id,
            'value'        => $healthPointsScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => 15,
            'character_id' => $character->id,
            'value'        => $healthPointsScore,
            'modificator'  => 0,
        ]);
    }
}

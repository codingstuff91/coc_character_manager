<?php

namespace App\Actions\Character;

use App\Enums\AttributeEnum;
use App\Models\AttributeCharacter;
use App\Models\Character;

class DefineLuckPointsAttributeAction
{
    public function defineFamilyBonusPoints(array $family)
    {
        return match($family['id']) {
            1 => 2,
            2 => 4,
            3 => 2,
        };
    }
    public function calculateLuckPointsScore(int $modificator, int $familyBonusPoints): int
    {
        return ($modificator + $familyBonusPoints);
    }
    public function execute(Character $character, array $characterAttributes, array $family)
    {
        $familyBonusPoints = $this->defineFamilyBonusPoints($family);

        $luckPointsScore = $this->calculateLuckPointsScore($characterAttributes['charisma']['modificator'], $familyBonusPoints);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::LUCK_P0INTS,
            'character_id' => $character->id,
            'value'        => $luckPointsScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::LUCK_POINTS_MAX,
            'character_id' => $character->id,
            'value'        => $luckPointsScore,
            'modificator'  => 0,
        ]);
    }
}

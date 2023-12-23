<?php

namespace App\Actions\Character;

use App\Enums\AttributeEnum;
use App\Models\AttributeCharacter;
use App\Models\Character;

class DefineHealthPointsAttributeAction
{
    public function calculateHealthPointsScore(int $modificator, array $family): int
    {
        return $modificator + $family['lifeDiceScore'];
    }

    public function execute(Character $character, array $characterAttributes, array $family): void
    {
        $healthPointsScore = $this->calculateHealthPointsScore($characterAttributes['constitution']['modificator'], $family);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::LIFE_DICE_SCORE,
            'character_id' => $character->id,
            'value'        => $family['lifeDiceScore'],
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::HEALTH_POINTS,
            'character_id' => $character->id,
            'value'        => $healthPointsScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::HEALTH_POINTS_MAX,
            'character_id' => $character->id,
            'value'        => $healthPointsScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::BAD_INJURY,
            'character_id' => $character->id,
            'value'        => 0,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::DAMAGE_RESISTANCE,
            'character_id' => $character->id,
            'value'        => 0,
            'modificator'  => 0,
        ]);
    }
}

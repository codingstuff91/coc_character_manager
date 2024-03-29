<?php

namespace App\Actions\Character;

use App\Enums\AttributeEnum;
use App\Models\AttributeCharacter;
use App\Models\Character;

class DefineAttackScoresAction
{
    public function execute(Character $character, array $characterAttributes): void
    {
        $contactAttackScore = $characterAttributes['strength']['modificator'];
        $distantAttackScore = $characterAttributes['dexterity']['modificator'];
        $magicAttackScore = $characterAttributes['intelligence']['modificator'];

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::CONTACT_ATTACK,
            'character_id' => $character->id,
            'value'        => $contactAttackScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::DISTANT_ATTACK,
            'character_id' => $character->id,
            'value'        => $distantAttackScore,
            'modificator'  => 0,
        ]);

        AttributeCharacter::create([
            'attribute_id' => AttributeEnum::MAGIC_ATTACK,
            'character_id' => $character->id,
            'value'        => $magicAttackScore,
            'modificator'  => 0,
        ]);
    }
}

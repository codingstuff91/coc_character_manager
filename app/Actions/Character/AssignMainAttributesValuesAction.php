<?php

namespace App\Actions\Character;

use App\Models\AttributeCharacter;
use App\Models\Character;

class AssignMainAttributesValuesAction
{
    public function execute(Character $character, $characterSkills)
    {
        foreach ($characterSkills as $skill) {
            AttributeCharacter::create([
                'attribute_id' => $skill['id'],
                'character_id' => $character->id,
                'value'        => $skill['score'],
                'modificator'  => $skill['modificator'],
            ]);
        }
    }
}

<?php

namespace App\Actions\Character;

use App\Models\AttributeCharacter;
use App\Models\Character;

class AssignMainAttributesValuesAction
{
    public function execute(Character $character, array $characterAttributes)
    {
        foreach ($characterAttributes as $attribute) {
            AttributeCharacter::create([
                'attribute_id' => $attribute['id'],
                'character_id' => $character->id,
                'value' => $attribute['score'],
                'modificator' => $attribute['modificator'],
            ]);
        }
    }
}

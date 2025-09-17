<?php

namespace App\Actions\Leveling;

use App\Models\Character;

class FinalizeCharacterPromotionAction
{
    public function execute(Character $character)
    {
        $character->can_level_up = false;
        $character->save();

        return to_route('characters.show', $character);
    }
}

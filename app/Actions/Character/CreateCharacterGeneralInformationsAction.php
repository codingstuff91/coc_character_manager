<?php

namespace App\Actions\Character;

use App\Models\Character;

class CreateCharacterGeneralInformationsAction
{
    public function execute(array $characterData, array $characterProfile, array $characterAdvantage, array $characterFamily)
    {
        $newCharacter = Character::create([
            'name'         => $characterData['name'],
            'gender'       => $characterData['gender'],
            'level'        => $characterData['level'],
            'height'       => $characterData['height'],
            'age'          => $characterData['age'],
            'profile_id'   => $characterProfile['id'],
            'advantage_id' => $characterAdvantage['id'],
            'family_id'    => $characterFamily['id']
        ]);

        return $newCharacter;
    }
}

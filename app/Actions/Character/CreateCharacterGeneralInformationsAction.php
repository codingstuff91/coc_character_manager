<?php

namespace App\Actions\Character;

use App\Models\Character;

class CreateCharacterGeneralInformationsAction
{
    public function execute(
        array $characterInformations,
        array $characterProfile,
        array $characterAdvantage,
        array $characterFamily
    ): Character
    {
        $newCharacter = Character::create([
            'name'         => $characterInformations['name'],
            'gender'       => $characterInformations['gender'],
            'level'        => $characterInformations['level'],
            'height'       => $characterInformations['height'],
            'age'          => $characterInformations['age'],
            'profile_id'   => $characterProfile['id'],
            'advantage_id' => $characterAdvantage['id'],
            'family_id'    => $characterFamily['id']
        ]);

        return $newCharacter;
    }
}

<?php

namespace App\Actions\Character;

use App\Models\Character;

class CreateCharacterGeneralInformationsAction
{
    public function execute(array $characterData)
    {
        $newCharacter = Character::create([
            'name' => $characterData['name'],
            'gender' => $characterData['gender'],
            'level' => $characterData['level'],
            'height' => $characterData['height'],
            'age' => $characterData['age'],
            'profile_id' => $characterData['profile']['id'],
            'advantage_id' => $characterData['advantage']['id'],
        ]);

        return $newCharacter;
    }
}

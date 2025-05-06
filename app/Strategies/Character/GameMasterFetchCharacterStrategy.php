<?php

namespace App\Strategies\Character;

use Illuminate\Contracts\Auth\Authenticatable;
use Inertia\Inertia;

class GameMasterFetchCharacterStrategy implements FetchCharacterInterface
{
    public function retrieveCharacters(Authenticatable $user)
    {
        $chronicles = $user->chronicles;

        return Inertia::render('Chronicle/Index', [
            'chronicles' => $chronicles,
        ]);
    }
}

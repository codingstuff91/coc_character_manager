<?php

namespace App\Strategies\Character;

use Illuminate\Contracts\Auth\Authenticatable;

interface FetchCharacterInterface
{
    public function retrieveCharacters(Authenticatable $user);
}

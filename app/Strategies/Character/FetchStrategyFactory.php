<?php

namespace App\Strategies\Character;

use Illuminate\Contracts\Auth\Authenticatable;

class FetchStrategyFactory
{
    public static function create(Authenticatable $user): FetchCharacterInterface
    {
        if ($user->role === 'game_master') {
            return new GameMasterFetchCharacterStrategy();
        }

        return new PlayerFetchCharacterStrategy();
    }
}

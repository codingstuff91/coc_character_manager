<?php

namespace App\Strategies\Character;

use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Auth\Authenticatable;

class FetchStrategyFactory
{
    public static function create(Authenticatable $user): FetchCharacterInterface
    {
        if ($user->role === UserRoleEnum::GAME_MASTER->value) {
            return new GameMasterFetchCharacterStrategy();
        }

        return new PlayerFetchCharacterStrategy();
    }
}

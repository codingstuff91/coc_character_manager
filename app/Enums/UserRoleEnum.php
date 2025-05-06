<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case GAME_MASTER = 'game_master';
    case PLAYER = 'player';
}

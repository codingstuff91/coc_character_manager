<?php

namespace App\Services;

final class DiceRoller
{
    public function roll(int $faces): int
    {
        return random_int(1, $faces);
    }
}

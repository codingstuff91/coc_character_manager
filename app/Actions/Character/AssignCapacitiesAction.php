<?php

namespace App\Actions\Character;

use App\Models\Character;
class AssignCapacitiesAction
{
    public function execute(Character $character, array $capacities)
    {
        foreach ($capacities as $capacity) {
            $character->capacities()->attach($capacity);
        }
    }
}

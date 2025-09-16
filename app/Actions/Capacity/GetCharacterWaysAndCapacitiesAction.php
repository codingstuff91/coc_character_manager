<?php

namespace App\Actions\Capacity;

use App\Models\Character;
use App\Models\CharacterWay;

class GetCharacterWaysAndCapacitiesAction
{
    public function execute(Character $character)
    {
        $characterCapacities = $character->capacities->pluck('character_way_id');
        $knownCapacities = $character->capacities->pluck('id');

        $ways = CharacterWay::with('capacities')->get();

        $ownedWays = $ways->filter(function($characterWay) use ($characterCapacities) {
            return $characterCapacities->contains($characterWay->id);
        });

        $remainingWays = $ways->reject(function($characterWay) use ($characterCapacities) {
            return $characterCapacities->contains($characterWay->id);
        });

        return [$ownedWays, $remainingWays, $knownCapacities];
    }
}

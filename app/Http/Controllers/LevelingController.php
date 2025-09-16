<?php

namespace App\Http\Controllers;

use App\Actions\Capacity\GetCharacterWaysAndCapacities;
use App\Actions\Leveling\DefineAdditionnalHealthPointsAction;
use App\Models\Character;
use App\Repositories\CharacterAttributeRepository;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class LevelingController extends Controller
{
    public function __construct(
        public DefineAdditionnalHealthPointsAction $computeHealthPointAction,
        public CharacterAttributeRepository $characterAttributeRepository,
        public GetCharacterWaysAndCapacities $getCharacterCapacities,
    ) {
    }

    public function promotion(Character $character)
    {
        $character->level += 1;
        $character->save();

        return to_route('level-up.health', $character);
    }

    public function health(Character $character): Response|ResponseFactory
    {
        $healthPoints = $this->computeHealthPointAction->execute($character);

        return inertia('Character/Leveling/HealthPoints', [
            'healthPoints' => $healthPoints,
            'character'    => $character,
        ]);
    }

    public function confirmHealthImprovement(Request $request)
    {
        $this->characterAttributeRepository->updateHealthPoints($request->character_id, $request->healthPoints);

        return to_route('level-up.capacities', $request->character_id);
    }

    public function capacities(Character $character)
    {
        [$ownedWays, $remainingWays, $knownCapacities] = $this->getCharacterCapacities->execute($character);

        return inertia('Character/Leveling/Capacities', [
            'character'       => $character,
            'ownedWays'       => $ownedWays,
            'remainingWays'   => $remainingWays,
            'knownCapacities' => $knownCapacities,
        ]);
    }

    public function confirmCapacities(Request $request)
    {
        dd($request->all());
    }
}

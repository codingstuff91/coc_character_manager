<?php

namespace App\Http\Controllers;

use App\Actions\Capacity\GetCharacterWaysAndCapacitiesAction;
use App\Actions\Character\AssignCapacitiesAction;
use App\Actions\Leveling\DefineAdditionnalHealthPointsAction;
use App\Actions\Leveling\FinalizeCharacterPromotionAction;
use App\Models\Character;
use App\Repositories\CharacterAttributeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class LevelingController extends Controller
{
    public function __construct(
        public DefineAdditionnalHealthPointsAction $computeHealthPointAction,
        public CharacterAttributeRepository $characterAttributeRepository,
        public GetCharacterWaysAndCapacitiesAction $getCharacterCapacitiesAction,
        public AssignCapacitiesAction $assignCapacitiesAction,
        public FinalizeCharacterPromotionAction $finalizeCharacterPromotionAction,
    ) {
    }

    public function improvement(Character $character): RedirectResponse
    {
        $character->can_level_up = true;
        $character->save();

        return to_route('characters.show', $character);
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
        [$ownedWays, $remainingWays, $knownCapacities] = $this->getCharacterCapacitiesAction->execute($character);

        return inertia('Character/Leveling/Capacities', [
            'character'       => $character,
            'ownedWays'       => $ownedWays,
            'remainingWays'   => $remainingWays,
            'knownCapacities' => $knownCapacities,
        ]);
    }

    public function confirmCapacities(Request $request, Character $character): RedirectResponse
    {
        $this->assignCapacitiesAction->execute($character, $request->capacities);

        return $this->finalizeCharacterPromotionAction->execute($character);
    }
}

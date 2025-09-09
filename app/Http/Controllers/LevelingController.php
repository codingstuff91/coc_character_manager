<?php

namespace App\Http\Controllers;

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
    ) {
    }

    public function promotion(Character $character)
    {
        $character->can_level_up = true;
        $character->level += 1;
        $character->save();
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
    }
}

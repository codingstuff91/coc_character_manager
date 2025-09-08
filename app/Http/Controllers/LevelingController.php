<?php

namespace App\Http\Controllers;

use App\Actions\Leveling\DefineAdditionnalHealthPointsAction;
use App\Models\Character;
use Illuminate\Http\Request;

class LevelingController extends Controller
{
    public function __construct(public DefineAdditionnalHealthPointsAction $computeHealthPointAction)
    {
    }

    public function promotion(Character $character)
    {
        $healthPoints = $this->computeHealthPointAction->execute($character);

        return inertia('Character/Leveling/HealthPoints', [
            'healthPoints' => $healthPoints,
        ]);
    }
}

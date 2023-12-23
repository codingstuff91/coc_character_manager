<?php

namespace App\Http\Controllers;

use App\Actions\Character\AssignCapacitiesAction;
use App\Actions\Character\AssignMainAttributesValuesAction;
use App\Actions\Character\CreateCharacterGeneralInformationsAction;
use App\Actions\Character\DefineAttackScoresAction;
use App\Actions\Character\DefineDefenseScoreAction;
use App\Actions\Character\DefineHealthPointsAttributeAction;
use App\Actions\Character\DefineLuckPointsAttributeAction;
use App\Models\Attribute;
use App\Models\Family;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterCreateController extends Controller
{
    public function create(): \Inertia\Response
    {
        $families = Family::all();
        $attributes = Attribute::all();

        return Inertia::render('Character/Create/MainForm', [
            'families'   => $families,
            'attributes' => $attributes,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $newCharacter = resolve(CreateCharacterGeneralInformationsAction::class)
                        ->execute($request->informations, $request->profile, $request->advantage, $request->family);

        resolve(AssignMainAttributesValuesAction::class)
            ->execute($newCharacter, $request->skills);

        resolve(DefineDefenseScoreAction::class)
            ->execute($newCharacter, $request->skills);

        resolve(DefineAttackScoresAction::class)
            ->execute($newCharacter, $request->skills);

        resolve(DefineHealthPointsAttributeAction::class)
            ->execute($newCharacter, $request->skills, $request->family);

        resolve(DefineLuckPointsAttributeAction::class)
            ->execute($newCharacter, $request->skills, $request->family);

        resolve(AssignCapacitiesAction::class)
            ->execute($newCharacter, $request->capacities);

        return to_route('character.associate');
    }
}

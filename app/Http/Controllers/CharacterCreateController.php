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
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterCreateController extends Controller
{
    public function create()
    {
        $families = Family::all();
        $attributes = Attribute::all();

        return Inertia::render('Character/Create/MainForm', [
            'families'   => $families,
            'attributes' => $attributes,
        ]);
    }

    public function store(Request $request)
    {
        $newCharacter = resolve(CreateCharacterGeneralInformationsAction::class)
                        ->execute($request->character['informations'],
                            $request->character['profile'],
                            $request->character['advantage'],
                            $request->character['family']);

        resolve(AssignMainAttributesValuesAction::class)
            ->execute($newCharacter, $request->character['characterAttributes']);

        resolve(DefineDefenseScoreAction::class)
            ->execute($newCharacter, $request->character['characterAttributes']);

        resolve(DefineAttackScoresAction::class)
            ->execute($newCharacter, $request->character['characterAttributes']);

        resolve(DefineHealthPointsAttributeAction::class)
            ->execute($newCharacter, $request->character['characterAttributes'], $request->character['family']);

        resolve(DefineLuckPointsAttributeAction::class)
            ->execute($newCharacter, $request->character['characterAttributes'], $request->character['family']);

        resolve(AssignCapacitiesAction::class)
            ->execute($newCharacter, $request->character['capacities']);

        return to_route('character.associate');
    }
}
